# Deploy — cara kerja dan cara lanjut dari sesi lain

Dokumen ini supaya sesi Claude Code mana pun (atau kamu sendiri manual) bisa deploy
`roziqrizal.com` tanpa re-derive prosesnya. Ditulis 10 Oktober 2026, diperbarui 17 Oktober 2026.

## Fakta penting

- **Git push ≠ deploy.** Push ke GitHub cuma riwayat/backup kode. Yang bikin perubahan
  tampil di `https://roziqrizal.com` adalah deploy manual ke VM (lihat di bawah).
- **Kode jalan di VM Linux di rumah**, bukan di layanan hosting. VM yang sama juga
  menjalankan habitflow dan MySQL bersama. Detail infrastruktur VM (Hyper-V, Cloudflare
  Tunnel, dll) ada di [repo `server`](https://github.com/elahady/build-server) — baca
  `ROADMAP.md` dan `TROUBLESHOOTING.md` di sana kalau masalahnya di VM, bukan di kode.
- Satu container (`roziqrizalcom`, port `8080`) melayani `roziqrizal.com`,
  `www.roziqrizal.com`, dan `server.roziqrizal.com` lewat ingress Cloudflare Tunnel.

## Akses VM

- SSH: `ssh elahady@homeserver-linux.mshome.net` — key-based auth sudah di-setup dari
  PC Windows ini (`~/.ssh/id_ed25519`), tidak perlu password. Pakai nama host ini, bukan
  IP: nama `*.mshome.net` di-resolve oleh Hyper-V Default Switch, jadi tetap benar
  walau IP VM berubah. Di bawah, `<ip-vm>` boleh diganti nama host ini.
- **IP VM bisa berubah** tiap VM restart (DHCP dari Hyper-V Default Switch). Contoh:
  10 Oktober 2026 `172.23.192.247`, 16 Oktober 2026 `172.28.157.112` — IP lama sudah
  tidak menjawab (SSH timeout). Kalau nama host gagal di-resolve, cek IP lewat Hyper-V
  Manager → Connect → login → `ip a` (baris `inet` di `eth0`). `Get-VM` dari PowerShell
  biasa ditolak (butuh admin/grup Hyper-V Administrators).
- Kode project ada di `~/apps/roziqrizalcom/` di VM (bukan hasil `git clone`, tidak ada
  folder `.git` di sana).

## Proses deploy

Cara cepat — dari root repo di PC Windows (Git Bash), setelah semua perubahan di-commit:

```bash
scripts/deploy.sh             # deploy HEAD ke VM
scripts/deploy.sh --dry-run   # cek repo + bangun arsip saja, VM tidak disentuh
```

[Script](scripts/deploy.sh) menjalankan langkah 1–5 di bawah, lalu berhenti dengan pesan
jelas kalau ada yang gagal: working tree kotor, branch bukan `main`, SSH tidak tersambung,
container tidak `healthy` dalam 90 detik, atau `https://roziqrizal.com/` tidak membalas 200.
Kalau IP/nama host VM berubah: `DEPLOY_HOST=elahady@<ip-vm> scripts/deploy.sh`
(`DEPLOY_DIR` dan `DEPLOY_URL` juga bisa di-override).

Langkah manual di bawah tetap berguna untuk debugging. Commit dulu — yang dikirim adalah
`HEAD`, jadi perubahan yang belum di-commit tidak ikut.

```bash
# 1. Arsip dari HEAD (hanya file ter-commit; .env* dan node_modules otomatis tidak ikut)
git archive --format=tar.gz HEAD -o /tmp/rr-deploy.tar.gz

# 2. Kirim ke VM
scp /tmp/rr-deploy.tar.gz elahady@<ip-vm>:~/apps/rr-deploy.tar.gz

# 3. Extract di VM (menimpa file lama) lalu build image baru
ssh elahady@<ip-vm> "cd ~/apps/roziqrizalcom && tar -xzf ../rr-deploy.tar.gz && rm ../rr-deploy.tar.gz && docker compose build"

# 4. Recreate container — pakai down + up, JANGAN cuma `up -d` (lihat catatan port di bawah)
ssh elahady@<ip-vm> "cd ~/apps/roziqrizalcom && docker compose down && docker compose up -d"

# 5. Tunggu ±15 detik sampai status (healthy), lalu verifikasi dari luar
ssh elahady@<ip-vm> "docker ps --format '{{.Names}} {{.Status}}' | grep roziqrizalcom"
curl -sI https://roziqrizal.com/ | head -1
```

Build memakai multi-stage [Dockerfile](Dockerfile): stage Node membangun aset Vite/Tailwind,
stage produksi `serversideup/php:8.3-fpm-nginx` menjalankan `composer install --no-dev`.
Karena itu `public/build` **tidak perlu** ada di git.

Tidak ada migrasi yang perlu dijalankan — situs ini tidak punya tabel konten.

**Catatan**: `tar -x` hanya menimpa/menambah file. Kalau kamu **menghapus** file di repo,
file itu masih ada di VM sampai dihapus manual (`ssh ... "rm ~/apps/roziqrizalcom/<path>"`).

## File kredensial — TIDAK ada di git

- `.env.production` (APP_KEY dll) gitignored dan di-exclude dari image (`.dockerignore`).
  Isinya ada di dua tempat: file lokal di PC ini, dan
  `~/apps/roziqrizalcom/.env.production` di VM. `docker-compose.yml` membacanya lewat
  `env_file` saat container dibuat — jadi kalau mengubahnya, jalankan `down` + `up -d`.
- **Kalau file lokal hilang**: tarik dari VM —
  `scp elahady@<ip-vm>:~/apps/roziqrizalcom/.env.production .env.production`. Jangan
  generate `APP_KEY` baru.

## Data persisten

Dua named volume Docker, tidak terhapus oleh `docker compose down` (selama tanpa `-v`):

- `storage` → `/var/www/html/storage`
- `sqlite-db` → `/var/www/html/database` (SQLite untuk keperluan internal Laravel saja)

**Jangan pernah** `docker compose down -v`.

## Hal-hal yang pernah bikin error

- Port `8080` gagal ter-publish kalau container dibuat ulang dengan `up -d` saja
  (race: Docker belum melepas port dari container lama). Fix: `down` dulu, baru `up -d`.
- Folder `storage/framework/sessions` dan `storage/framework/views` tidak ada di repo;
  karena `storage` di-mount sebagai volume kosong, folder itu dibuat eksplisit di
  [Dockerfile](Dockerfile). Jangan hapus baris `mkdir` itu.
- Detail lengkap dan riwayat trial-error ada di `TROUBLESHOOTING.md` repo `server`.
