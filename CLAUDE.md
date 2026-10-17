# roziqrizal.com — Personal Branding Website

## Konvensi kode & konten

Baca [README.md](README.md) **sebelum** menambah halaman, post, atau partial
baru — di situ ada aturan single-source-of-truth untuk metadata post
(`app/Support/Posts.php`), partial yang wajib dipakai ulang
(`post-card`, `no-comments`), dan aturan no-inline-style. File ini (CLAUDE.md)
fokus ke tema/narasi situs, bukan konvensi teknis.

## Aturan Kerja

**Setiap perubahan di repo ini harus selalu di-commit DAN di-push** — tidak
menunggu diminta secara eksplisit tiap kali, berlaku untuk perubahan sekecil apa pun
(kode, konten, dokumentasi).

**Deploy ke VM hanya dilakukan saat diminta** (lewat `scripts/deploy.sh`). Push ke GitHub tidak otomatis deploy,
dan deploy tidak ikut otomatis setelah commit/push — tunggu user menyuruh.

## Deploy

Push ke GitHub **tidak** otomatis deploy. Cara deploy ke VM rumah ada di
[DEPLOY.md](DEPLOY.md) — baca sebelum deploy.

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
