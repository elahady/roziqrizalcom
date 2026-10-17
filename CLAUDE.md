# roziqrizal.com — Personal Branding Website

## Konvensi kode & konten

Baca [README.md](README.md) **sebelum** menambah halaman, post, atau partial
baru — di situ ada aturan single-source-of-truth untuk metadata post
(`app/Support/Posts.php`), komponen/partial yang wajib dipakai ulang
(`<x-layout>`, `<x-post>`, `<x-page>`, `post-row`, `no-comments`), dan aturan
no-inline-style. File ini (CLAUDE.md) fokus ke tema/narasi situs dan status
pengembangan, bukan konvensi teknis.

## Aturan Kerja

**Setiap perubahan di repo ini harus selalu di-commit DAN di-push** — tidak
menunggu diminta secara eksplisit tiap kali, berlaku untuk perubahan sekecil apa pun
(kode, konten, dokumentasi).

**Deploy ke VM hanya dilakukan saat diminta** (lewat `scripts/deploy.sh`). Push ke GitHub tidak otomatis deploy,
dan deploy tidak ikut otomatis setelah commit/push — tunggu user menyuruh.

## Deploy

Push ke GitHub **tidak** otomatis deploy. Cara deploy ke VM rumah ada di
[DEPLOY.md](DEPLOY.md) — baca sebelum deploy.

## Status Pengembangan

_Diperbarui 17 Oktober 2026. Bagian ini potret keadaan **sekarang**, bukan log: ubah di
tempat setiap selesai pekerjaan nyata (hapus yang sudah selesai dari "Belum", jangan
menumpuk riwayat — riwayat ada di `git log`). Baca ini dulu saat membuka sesi baru._

### Sudah selesai (dan sudah live di roziqrizal.com)

- **Deploy satu perintah:** `scripts/deploy.sh` (`--dry-run` untuk uji tanpa menyentuh VM),
  menggantikan langkah manual di DEPLOY.md.
- **Halaman placeholder dihapus:** `/culture-leadership`, `/the-bridge`,
  `/anonymized-case-studies` (tanpa naskah, tidak ditautkan) — kini 404.
- **Journal sinergi dengan Denah Hidup** (mockup disetujui, lalu diimplementasi; deploy
  terakhir commit `39c350c`):
  - Satu layout `<x-layout>` untuk semua halaman; layout lama, sidebar, nav lama, dan
    `public/css/app.css` sudah dihapus. Menu header: Denah, Karya, Journal, **Profil**
    (dropdown berisi Tentang saya, I'm Project Manager + Playbook, Tech Enthusiast,
    Market Observer, Hajj 2026).
  - Post punya `room` (+ `series` opsional) di `Posts.php`; sembilan ruang ada di
    `app/Support/Rooms.php`. Pemetaan sekarang: 4 jurnal BTCUSD → Taktik, Emas/Dolar/RDPU →
    Finansial, 2 post Al-Kaukaba → Angkasa, "A Day in My Life" → Kerja.
  - `/journal` urut terbaru; filter `/journal?ruang=<slug>` (404 untuk slug tak dikenal;
    chip hanya untuk ruang yang punya post). `/category/*` lama → 301 ke `?ruang=taktik`.
  - `<x-post>` (judul, meta, kartu ruang asal, navigasi lebih lama/baru, slot `comments`)
    dan `<x-page>` (halaman profil). Kartu ruang di homepage menaut ke Journal dengan
    jumlah tulisan. Tes: `tests/Feature/JournalTest.php`.
  - Mockup acuan (artifact Claude, privat): https://claude.ai/artifact/43LHPjKGDLLLgRqDPHgZuk

### Belum selesai / berikutnya

1. **`/haji-2026`** baru outline; entri Day 1–40 dan catatan Karu belum ditulis.
2. **Post lama perlu ditinjau:** `al-kaukaba` masih mengajak jadi tester Play Store dan
   menyebut fitur Hijriah/Gerhana "sedang dikembangkan" (aplikasinya kini sudah di Google
   Play); post trading Maret 2026 mungkin perlu dicek relevansinya.
3. **Sembilan ruang di homepage** tiap kartu masih ringkas, dan hanya 4 ruang yang punya
   tulisan (Finansial, Kerja, Angkasa, Taktik); Antara, Takmir, Perpustakaan, Permainan,
   Hati belum.
4. **Kerapian kecil:** `<em>` di isi artikel terlihat rapat (Manrope tak punya italic asli);
   homepage melebar 398 px di HP 390 px (sudah ada sebelum migrasi); footer membungkus
   tautan LinkedIn ke baris kedua.
5. **Keputusan terbuka** (sementara memakai default di kurung): apakah jurnal trading
   disembunyikan dari tab "Semua" bila terus bertambah (default: bercampur, urut tanggal);
   Al-Kaukaba di Angkasa atau Takmir (Angkasa); halaman profil dipetakan ke ruang (tidak,
   menu Profil datar); cuplikan "Jurnal terbaru" di homepage (lapis 3, belum dikerjakan).

### Catatan teknis yang tidak kelihatan dari kode

- **Deploy menghapus file?** `tar -x` hanya menimpa/menambah. Kalau commit menghapus file,
  hapus juga manual di VM sebelum `scripts/deploy.sh` (lihat DEPLOY.md), lalu cek URL-nya 404.
- Tes yang memanggil `/` memakai `@vite` dan butuh `public/build` — jalankan `npm run build`
  sekali di mesin lokal sebelum `php artisan test` (`JournalTest` memakai `withoutVite()`).
- Jangan hapus `scripts/` dari `.gitattributes` `export-ignore`: folder itu tidak boleh ikut
  arsip deploy.

## Tema Inti

> "Saya membangun sistem untuk setiap peran dalam hidup saya — dari uang sampai hati, dari kerja sampai diam."

Landasannya adalah hadits berikut:

> إِنَّ لِرَبِّكَ عَلَيْكَ حَقًّا، وَلِنَفْسِكَ عَلَيْكَ حَقًّا، وَلِأَهْلِكَ عَلَيْكَ حَقًّا، فَأَعْطِ كُلَّ ذِي حَقٍّ حَقَّهُ
>
> "Sesungguhnya Rabbmu memiliki hak atasmu, dirimu memiliki hak atasmu, dan keluargamu memiliki hak atasmu. Maka berikanlah hak kepada setiap yang memiliki hak."

Ini adalah premis utama dari seluruh situs (lihat homepage "Denah Hidup" di [resources/views/home.blade.php](resources/views/home.blade.php) dan ruang-ruang di [resources/views/rooms/](resources/views/rooms/)). Setiap ide, fitur, konten, atau perubahan desain yang diusulkan untuk situs ini harus berangkat dari tema ini — bahwa hidup dipandang sebagai kumpulan "ruang"/peran (Investor, Leader, Servant, Husband, Observer, Trader, Gamer, Reader, dll.), masing-masing adalah "hak" yang harus ditunaikan dengan sistemnya sendiri, namun tetap satu kesatuan yang koheren.

Saat memberi saran konten, struktur navigasi, atau desain baru, prioritaskan opsi yang memperkuat gagasan "satu orang, banyak ruang, satu sistem" ini — bukan sekadar fitur generik blog/portfolio.

## Desain

- Desain acuan (source of truth) ada di homepage — palet sage/Material-3 (`resources/css/app.css`, token warna `--color-primary` dll.), font Libre Caslon Text (judul/serif) + Manrope (body/UI).
- Semua halaman (Journal, post, profil, Karya) memakai satu layout, [resources/views/components/layout.blade.php](resources/views/components/layout.blade.php) (`<x-layout>`), dengan header dan footer yang sama; homepage punya hero sendiri. Journal terhubung ke tema lewat filter ruang (`/journal?ruang=<slug>`), lihat [app/Support/Rooms.php](app/Support/Rooms.php).

## Shortcut Project (lokal, khusus mesin ini)

Saat user menyebut nama singkat berikut, buka/kerjakan di direktori terkait:

- "project android" → `C:\Project\Personal\alkaukabaandroid`
- "web alkaukaba" → `C:\xampp\htdocs\alkaukabaweb`
- "web personal" → `C:\xampp\htdocs\roziqrizalcom`
