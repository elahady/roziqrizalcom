@php
    $webUrl = 'https://habitflow.roziqrizal.com/login';

    $facts = [
        ['Coba sekarang', 'Versi web, masuk dengan email atau akun Google'],
        ['Android', 'Belum dirilis ke Play Store'],
        ['Cocok untuk', 'Orang yang menjalani banyak peran dalam satu hari'],
        ['Bahasa', 'Indonesia'],
    ];

    // Kelas per varian ditulis utuh supaya terbaca oleh Tailwind.
    $variants = [
        'wide' => [
            'card' => 'min-h-[340px] p-8 md:p-10 border-surface-variant hover:border-primary soft-gradient',
            'platform' => 'text-tertiary',
            'eyebrow' => 'text-on-primary-container',
            'title' => 'text-headline-md text-on-surface',
            'tagline' => 'text-lg text-on-surface-variant',
            'body' => 'text-body-md text-on-surface-variant',
        ],
        'dark' => [
            'card' => 'min-h-[340px] p-8 md:p-10 border-primary bg-primary text-on-primary',
            'platform' => 'text-primary-fixed',
            'eyebrow' => 'text-primary-fixed',
            'title' => 'text-headline-md text-on-primary',
            'tagline' => 'text-lg text-primary-fixed',
            'body' => 'text-body-md text-primary-fixed',
        ],
        'plain' => [
            'card' => 'min-h-[260px] p-8 border-surface-variant hover:border-primary bg-surface hover:bg-surface-container-low',
            'platform' => 'text-tertiary',
            'eyebrow' => 'text-secondary',
            'title' => 'text-2xl text-on-surface',
            'tagline' => 'text-base text-on-surface-variant',
            'body' => 'text-sm leading-6 text-on-surface-variant',
        ],
    ];

    $features = [
        [
            'variant' => 'wide', 'col' => 'md:col-span-8', 'platform' => 'Android dan web',
            'eyebrow' => 'Catat dalam dua detik',
            'title' => 'Follow-up kerja',
            'tagline' => 'Tidak ada target kerja yang terlupa.',
            'body' => 'Satu kolom teks untuk mencatat, lalu dirapikan lewat daily scrum pagi dan EOD sore. Tidak ada batas jumlah, dan tidak memengaruhi streak habit.',
            'tags' => ['Inbox', 'Aktif', 'Menunggu', 'Selesai'],
        ],
        [
            'variant' => 'dark', 'col' => 'md:col-span-4', 'platform' => 'Android dan web',
            'eyebrow' => 'Dikerjakan bersama',
            'title' => 'To-Do Tim',
            'tagline' => 'Daftar tugas yang dibagi dengan orang lain.',
            'body' => 'Undang lewat tautan, misalnya pasangan, lalu kerjakan bersama dari Android atau web.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4', 'platform' => 'Android dan web',
            'title' => 'Habit dan to-do harian',
            'tagline' => 'Habit yang Anda tentukan sendiri.',
            'body' => 'Tambah, ubah, dan tandai habit wajib sesuai hidup Anda. Ada level harian, streak, dan heatmap kontribusi.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4', 'platform' => 'Android, web hanya baca',
            'title' => 'Jadwal harian',
            'tagline' => 'Susun blok waktu sendiri.',
            'body' => 'Patokannya jam tetap atau waktu sholat. Tiap blok punya tingkat pengingat sendiri, dari notifikasi senyap sampai alarm. Di web, blok yang sedang berjalan dan berikutnya tampil di Beranda.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4', 'platform' => 'Android',
            'title' => 'Pengingat minum dan istirahat',
            'tagline' => 'Pengingat yang tahu kapan harus diam.',
            'body' => 'Hanya muncul di jam kerja yang Anda tentukan, dan berhenti sendiri kalau diabaikan.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-6', 'platform' => 'Android, web hanya baca',
            'title' => 'Kesehatan',
            'tagline' => 'Angka sebagai informasi, bukan diagnosis.',
            'body' => 'Langkah dari Health Connect, berat badan, dan tensi, lengkap dengan kategorinya. Dari angka itu app menyarankan satu fokus untuk hari ini, dan grafiknya bisa dilihat di web.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-6', 'platform' => 'Android',
            'title' => 'Kalender dan acara rutin',
            'tagline' => 'Satu agenda, tanpa notifikasi ganda.',
            'body' => 'Acara Habitflow dan kalender HP tampil bersama. Hanya acara Habitflow yang diingatkan 15 menit sebelumnya.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-6', 'platform' => 'Android dan web',
            'title' => 'Rekap harian dan catatan EOD',
            'tagline' => 'Hari kerja ditutup dengan angka, bukan perasaan.',
            'body' => 'Web menampilkan tingkat selesai, rencana besok, dan catatan EOD yang sinkron dengan HP. Kalau dua perangkat menulis catatan berbeda, keduanya dipertahankan.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-6', 'platform' => 'Android dan web',
            'title' => 'Ringkasan dari Claude',
            'tagline' => 'Email pagi dirangkum sebelum kerja dimulai.',
            'body' => 'Tiap pagi Claude merangkum email yang belum dibaca lalu menuliskannya ke Habitflow, sebagai kartu baca-saja di halaman Kerja. Saat ini baru saya pakai sendiri.',
        ],
    ];

    $principles = [
        ['Tenang, bukan memarahi.', 'Habit yang belum dicentang tampil abu-abu netral, bukan merah.'],
        ['Sedikit notifikasi yang berarti.', 'Lebih baik sedikit dan dibaca daripada banyak dan diabaikan.'],
        ['Offline dulu.', 'Fitur inti di Android jalan tanpa internet, dan HP adalah sumber datanya.'],
        ['Habit tetap pusat.', 'Jadwal, kesehatan, dan kerja terhubung ke habit yang Anda pilih, supaya satu centang cukup.'],
    ];

    $webScreens = $project['web_screens'] ?? [];
@endphp
<x-layout-main title="Habitflow – Karya" active="karya" description="Habitflow: asisten harian pribadi yang menyatukan habit, jadwal, follow-up kerja, dan to-do bersama. Dibangun sendiri untuk Android dan web.">

    {{-- Hero --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 pt-10 pb-16 md:pb-20">
        <a href="{{ url('/#karya') }}" class="inline-block mb-10 font-manrope text-label-caps uppercase text-tertiary hover:text-primary transition-colors duration-200">&larr; Semua karya</a>

        <div class="flex flex-col md:flex-row gap-12 md:gap-16 items-center">
            <div class="md:w-1/2 space-y-6">
                <span class="inline-block px-3 py-1 bg-sage-pastel/60 text-on-primary-container rounded font-manrope text-label-caps uppercase tracking-widest">Karya &middot; {{ $project['rooms'] }}</span>
                <h1 class="font-serif-display text-[48px] leading-[56px] md:text-[72px] md:leading-[84px] tracking-[-0.02em] text-on-surface">{{ $project['name'] }}</h1>
                <p class="font-serif-display italic text-2xl text-on-surface-variant leading-9">Tahu sedang di blok apa sekarang, dan apa yang berikutnya.</p>
                <p class="font-manrope text-body-lg text-on-surface-variant max-w-xl">Asisten harian pribadi yang saya bangun sendiri. Awalnya hanya pencatat habit dengan heatmap ala GitHub. Sekarang ia menyatukan jadwal harian, waktu sholat, follow-up kerja, kesehatan, dan to-do bersama, di Android dan di web.</p>
                <ul class="flex flex-wrap gap-2">
                    <li class="font-manrope text-label-caps rounded px-3 py-1 bg-sage-pastel text-on-primary-container">{{ $project['status_label'] }}</li>
                    @foreach ($project['tech'] as $tech)
                        <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">{{ $tech }}</li>
                    @endforeach
                </ul>
                <div class="pt-2 flex flex-col sm:flex-row gap-4">
                    <a href="{{ $webUrl }}" target="_blank" rel="noopener" class="bg-primary text-on-primary px-8 py-3 rounded font-manrope text-label-caps uppercase hover:bg-on-primary-container transition-colors duration-300 text-center">Buka Habitflow Web &rarr;</a>
                    <a href="#layar" class="border border-primary text-primary px-8 py-3 rounded font-manrope text-label-caps uppercase hover:bg-sage-pastel/20 transition-colors duration-300 text-center">Lihat tangkapan layar</a>
                </div>
            </div>

            <div class="md:w-1/2 w-full soft-gradient border border-surface-variant rounded-xl ambient-glow px-6 py-10 md:px-8 md:py-12 flex justify-center items-start gap-6">
                @foreach (array_slice($project['screens'], 0, 2) as $i => $screen)
                    <div class="w-1/2 max-w-[200px] rounded-2xl border border-outline-variant overflow-hidden bg-white ambient-glow {{ $i === 1 ? 'mt-16' : '' }}">
                        <img src="{{ \App\Support\Projects::imageUrl($screen['file']) }}" alt="{{ $screen['alt'] }}" width="540" height="1200" class="block w-full h-auto">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

    {{-- Yang perlu diketahui pengunjung --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 py-12">
        <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($facts as [$label, $value])
                <div class="space-y-2">
                    <dt class="font-manrope text-label-caps uppercase text-tertiary">{{ $label }}</dt>
                    <dd class="font-serif-display text-xl text-on-surface leading-[30px]">{{ $value }}</dd>
                </div>
            @endforeach
        </dl>
    </section>

    <hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

    {{-- Masalah --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <div class="flex flex-col md:flex-row gap-8 md:gap-16">
            <h2 class="md:w-1/3 font-serif-display text-headline-md text-on-surface">Masalah yang ingin saya selesaikan</h2>
            <div class="md:w-2/3 space-y-5">
                <p class="font-manrope text-body-md text-on-surface-variant">Hidup saya terbagi ke banyak peran, dan tiap peran punya jadwal, target, dan hal yang harus ditindaklanjuti. Dulu semuanya tersebar: habit di satu aplikasi, task harian di Notion, alarm di jam, kalender di tempat lain.</p>
                <p class="font-serif-display italic text-2xl text-on-surface leading-9">Yang saya butuhkan bukan satu fitur lagi, melainkan satu sistem yang menyatukan semuanya dan mengingatkan di waktu yang tepat, tanpa memarahi.</p>
            </div>
        </div>
    </section>

    <hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

    {{-- Fitur. Label pojok = di mana fitur itu tersedia sekarang --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <div class="mb-12">
            <h2 class="font-serif-display text-headline-md text-on-surface mb-2">Yang bisa dilakukan</h2>
            <p class="font-manrope text-body-md text-on-surface-variant max-w-2xl">Habit, jadwal, dan pengingat diatur sesuai hidup Anda sendiri. Label di pojok kartu menunjukkan di mana fitur itu tersedia sekarang.</p>
        </div>

        <div class="grid grid-cols-12 gap-8">
            @foreach ($features as $feature)
                @php $v = $variants[$feature['variant']]; @endphp
                <article class="bento-card rounded-xl border col-span-12 {{ $feature['col'] }} {{ $v['card'] }} flex flex-col justify-between gap-8">
                    <div class="flex justify-end">
                        <span class="font-manrope text-label-caps {{ $v['platform'] }}">{{ $feature['platform'] }}</span>
                    </div>
                    <div class="space-y-3">
                        @isset($feature['eyebrow'])
                            <span class="block font-manrope text-label-caps {{ $v['eyebrow'] }}">{{ $feature['eyebrow'] }}</span>
                        @endisset
                        <h3 class="font-serif-display {{ $v['title'] }}">{{ $feature['title'] }}</h3>
                        <p class="font-serif-display italic {{ $v['tagline'] }}">{{ $feature['tagline'] }}</p>
                        <p class="font-manrope {{ $v['body'] }}">{{ $feature['body'] }}</p>
                        @isset($feature['tags'])
                            <ul class="flex flex-wrap gap-2 pt-2">
                                @foreach ($feature['tags'] as $tag)
                                    <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">{{ $tag }}</li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

    {{-- Prinsip desain --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <h2 class="font-serif-display text-headline-md text-on-surface mb-12">Prinsip desain</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-12">
            @foreach ($principles as [$heading, $text])
                <div class="border-t border-outline-variant pt-6 space-y-2">
                    <h3 class="font-serif-display italic text-[22px] leading-8 text-on-surface">{{ $heading }}</h3>
                    <p class="font-manrope text-body-md text-on-surface-variant">{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

    {{-- Tangkapan layar --}}
    <section id="layar" class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <div class="mb-12 space-y-2">
            <h2 class="font-serif-display text-headline-md text-on-surface">Tangkapan layar</h2>
            <p class="font-manrope text-sm text-tertiary">Semua tangkapan layar memakai data contoh, bukan data pribadi.</p>
        </div>

        @if ($webScreens)
            <h3 class="mb-6 font-manrope text-label-caps uppercase text-on-primary-container">Web</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                @foreach ($webScreens as $screen)
                    <figure class="space-y-4">
                        <div class="rounded-xl border border-outline-variant overflow-hidden bg-white ambient-glow">
                            <img src="{{ \App\Support\Projects::imageUrl($screen['file']) }}" alt="{{ $screen['alt'] }}" loading="lazy" class="block w-full h-auto">
                        </div>
                        @isset($screen['caption'])
                            <figcaption class="font-manrope text-label-caps uppercase text-tertiary text-center">{{ $screen['caption'] }}</figcaption>
                        @endisset
                    </figure>
                @endforeach
            </div>

            <h3 class="mb-6 font-manrope text-label-caps uppercase text-on-primary-container">Android</h3>
        @endif

        <div class="flex flex-wrap justify-center gap-8">
            @foreach ($project['screens'] as $screen)
                <figure class="w-full max-w-[280px] space-y-4">
                    <div class="rounded-[20px] border border-outline-variant overflow-hidden bg-white ambient-glow">
                        <img src="{{ \App\Support\Projects::imageUrl($screen['file']) }}" alt="{{ $screen['alt'] }}" width="540" height="1200" loading="lazy" class="block w-full h-auto">
                    </div>
                    @isset($screen['caption'])
                        <figcaption class="font-manrope text-label-caps uppercase text-tertiary text-center">{{ $screen['caption'] }}</figcaption>
                    @endisset
                </figure>
            @endforeach
        </div>
    </section>

    {{-- Status dan ajakan --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 pb-20 md:pb-24">
        <div class="bg-sage-pastel/50 border border-surface-variant rounded-xl p-8 md:p-12 flex flex-col md:flex-row gap-8 md:items-center justify-between">
            <div class="space-y-3 max-w-xl">
                <span class="block font-manrope text-label-caps uppercase text-on-primary-container">Status</span>
                <h2 class="font-serif-display text-headline-md text-on-surface">Dikembangkan aktif</h2>
                <p class="font-manrope text-body-md text-on-surface-variant">Versi web sudah bisa dibuka dengan email atau akun Google. Aplikasi Android belum dirilis ke Play Store. Jadwal dan kesehatan sudah bisa dilihat di web, tetapi disusun dan dicatat dari Android. Kalender masih menyusul ke web.</p>
            </div>
            <a href="{{ $webUrl }}" target="_blank" rel="noopener" class="shrink-0 bg-primary text-on-primary px-8 py-3 rounded font-manrope text-label-caps uppercase hover:bg-on-primary-container transition-colors duration-300 text-center">Buka Habitflow Web &rarr;</a>
        </div>
    </section>

</x-layout-main>
