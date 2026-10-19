# Deploy — cara kerja dan cara lanjut dari sesi lain

Dokumen ini supaya sesi Claude Code mana pun (atau kamu sendiri manual) bisa deploy
`roziqrizal.com` tanpa re-derive prosesnya. Ditulis 10 Oktober 2026, diperbarui 18 Oktober
2026 (migrasi VM rumah → VPS, lihat [MIGRATION.md repo server](https://github.com/elahady/build-server/blob/main/MIGRATION.md)).

## Fakta penting

- **Git push ≠ deploy.** Push ke GitHub cuma riwayat/backup kode. Yang bikin perubahan
  tampil di `https://roziqrizal.com` adalah deploy manual ke VPS (lihat di bawah).
- **Kode jalan di VPS IDCloudHost Jakarta** (`103.54.170.198`), bukan di VM rumah lagi
  (VM lama sudah tidak dipakai sejak 18 Oktober 2026 — motherboard PC rumah rusak). VPS
  yang sama juga menjalankan habitflow dan MySQL bersama. Detail infrastruktur VPS
  (Docker, nginx, Cloudflare Origin Cert, dll) ada di
  [repo `server`](https://github.com/elahady/build-server) — baca `ROADMAP.md` dan
  `CLAUDE.md` di sana kalau masalahnya di VPS, bukan di kode.
- Satu container (`roziqrizalcom`, port `8080`) melayani `roziqrizal.com`,
  `www.roziqrizal.com`, dan `server.roziqrizal.com` lewat nginx + Cloudflare Origin
  Certificate (Cloudflare proxied, **bukan Cloudflare Tunnel** — arsitektur lama sudah
  dihentikan).

## Akses VPS

- SSH: `ssh -i ~/.ssh/id_ed25519_vps_jakarta elahady@103.54.170.198` — key-based auth,
  **password login dimatikan** (SSH di-hardening). Pakai IP ini langsung, bukan nama
  host — VPS ini IP publik tetap (bukan DHCP seperti VM Hyper-V lama), tidak berubah
  tiap restart.
- Kode project ada di `~/apps/roziqrizalcom/` di VPS (bukan hasil `git clone`, tidak ada
  folder `.git` di sana).

## Proses deploy

Cara cepat — dari root repo di PC Windows (Git Bash), setelah semua perubahan di-commit:

```bash
scripts/deploy.sh             # deploy HEAD ke VPS
scripts/deploy.sh --dry-run   # cek repo + bangun arsip saja, VPS tidak disentuh
```

[Script](scripts/deploy.sh) menjalankan langkah 1–5 di bawah, lalu berhenti dengan pesan
jelas kalau ada yang gagal: working tree kotor, branch bukan `main`, SSH tidak tersambung,
container tidak `healthy` dalam 90 detik, atau `https://roziqrizal.com/` tidak membalas 200.
Default `DEPLOY_HOST=elahady@103.54.170.198` dan `DEPLOY_KEY=~/.ssh/id_ed25519_vps_jakarta`
— override kalau perlu, `DEPLOY_DIR` dan `DEPLOY_URL` juga bisa di-override.

Langkah manual di bawah tetap berguna untuk debugging. Commit dulu — yang dikirim adalah
`HEAD`, jadi perubahan yang belum di-commit tidak ikut.

```bash
# 1. Arsip dari HEAD (hanya file ter-commit; .env* dan node_modules otomatis tidak ikut)
git archive --format=tar.gz HEAD -o /tmp/rr-deploy.tar.gz

# 2. Kirim ke VPS
scp -i ~/.ssh/id_ed25519_vps_jakarta /tmp/rr-deploy.tar.gz elahady@103.54.170.198:~/apps/rr-deploy.tar.gz

# 3. Extract di VPS (menimpa file lama) lalu build image baru
ssh -i ~/.ssh/id_ed25519_vps_jakarta elahady@103.54.170.198 "cd ~/apps/roziqrizalcom && tar -xzf ../rr-deploy.tar.gz && rm ../rr-deploy.tar.gz && docker compose build"

# 4. Recreate container — pakai down + up, JANGAN cuma `up -d` (lihat catatan port di bawah)
ssh -i ~/.ssh/id_ed25519_vps_jakarta elahady@103.54.170.198 "cd ~/apps/roziqrizalcom && docker compose down && docker compose up -d"

# 5. Tunggu ±15 detik sampai status (healthy), lalu verifikasi dari luar
ssh -i ~/.ssh/id_ed25519_vps_jakarta elahady@103.54.170.198 "docker ps --format '{{.Names}} {{.Status}}' | grep roziqrizalcom"
curl -sI https://roziqrizal.com/ | head -1
```

Build memakai multi-stage [Dockerfile](Dockerfile): stage Node membangun aset Vite/Tailwind,
stage produksi `serversideup/php:8.3-fpm-nginx` menjalankan `composer install --no-dev`.
Karena itu `public/build` **tidak perlu** ada di git.

Tidak ada migrasi yang perlu dijalankan — situs ini tidak punya tabel konten.

**Catatan**: `tar -x` hanya menimpa/menambah file. Kalau kamu **menghapus** file di repo,
file itu masih ada di VPS sampai dihapus manual (`ssh ... "rm ~/apps/roziqrizalcom/<path>"`).

## File kredensial — TIDAK ada di git

- `.env.production` (APP_KEY dll) gitignored dan di-exclude dari image (`.dockerignore`).
  Isinya ada di dua tempat: file lokal di PC ini, dan
  `~/apps/roziqrizalcom/.env.production` di VPS. `docker-compose.yml` membacanya lewat
  `env_file` saat container dibuat — jadi kalau mengubahnya, jalankan `down` + `up -d`.
- **Kalau file lokal hilang**: tarik dari VPS —
  `scp -i ~/.ssh/id_ed25519_vps_jakarta elahady@103.54.170.198:~/apps/roziqrizalcom/.env.production .env.production`.
  Jangan generate `APP_KEY` baru.

## Data persisten

Dua named volume Docker, tidak terhapus oleh `docker compose down` (selama tanpa `-v`):

- `storage` → `/var/www/html/storage`
- `sqlite-db` → `/var/www/html/database` (SQLite untuk keperluan internal Laravel saja)

**Jangan pernah** `docker compose down -v`.

## Hal-hal yang pernah bikin error

- **(Belum pernah terjadi di sini per 19 Oktober 2026, tapi berpotensi)**: base image
  `serversideup/php:8.3-fpm-nginx` (dipakai di [Dockerfile](Dockerfile)) defaultnya listen di
  IPv4 **dan** IPv6. VPS ini tidak mendukung IPv6, dan `habitflow` + `rizqflow` (VPS yang sama,
  base image yang sama) sudah kena ini saat `docker compose build` menarik versi base image yang
  lebih baru: nginx gagal start (`socket() [::]:8080 failed`), container `unhealthy` terus. Kalau
  kejadian di sini juga: tambahkan `NGINX_LISTEN_IP_PROTOCOL=ipv4` di `.env.production`. Detail
  insiden lengkap di `habitflow/server/DEPLOY.md`.
- Port `8080` gagal ter-publish kalau container dibuat ulang dengan `up -d` saja
  (race: Docker belum melepas port dari container lama). Fix: `down` dulu, baru `up -d`.
- Folder `storage/framework/sessions` dan `storage/framework/views` tidak ada di repo;
  karena `storage` di-mount sebagai volume kosong, folder itu dibuat eksplisit di
  [Dockerfile](Dockerfile). Jangan hapus baris `mkdir` itu.
- Detail lengkap dan riwayat trial-error ada di `TROUBLESHOOTING.md` repo `server`.
