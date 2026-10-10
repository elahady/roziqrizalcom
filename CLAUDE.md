# roziqrizal.com — Personal Branding Website

## Konvensi kode & konten

Baca [README.md](README.md) **sebelum** menambah halaman, post, atau partial
baru — di situ ada aturan single-source-of-truth untuk metadata post
(`app/Support/Posts.php`), partial yang wajib dipakai ulang
(`post-card`, `no-comments`), dan aturan no-inline-style. File ini (CLAUDE.md)
fokus ke tema/narasi situs, bukan konvensi teknis.

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
- Halaman lain (Journal, About, dll.) memakai layout lama ([resources/views/components/layout.blade.php](resources/views/components/layout.blade.php) + `public/css/app.css`) yang sudah direstyle agar konsisten dengan palet & font homepage.

## Shortcut Project (lokal, khusus mesin ini)

Saat user menyebut nama singkat berikut, buka/kerjakan di direktori terkait:

- "project android" → `C:\Project\Personal\alkaukabaandroid`
- "web alkaukaba" → `C:\xampp\htdocs\alkaukabaweb`
- "web personal" → `C:\xampp\htdocs\roziqrizalcom`
