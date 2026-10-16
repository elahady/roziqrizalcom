@php
    $playUrl = 'https://play.google.com/store/apps/details?id=site.elahady.alkaukaba';

    $facts = [
        ['Coba sekarang', 'Android, unduh gratis di Google Play'],
        ['Cocok untuk', 'Santri, pegiat falak, dan siapa pun yang ingin waktu ibadahnya presisi'],
        ['Cara masuk', 'Daftar dengan email atau akun Google'],
        ['Bahasa', 'Indonesia'],
    ];

    // Kelas per varian ditulis utuh supaya terbaca oleh Tailwind.
    $variants = [
        'wide' => [
            'card' => 'min-h-[340px] p-8 md:p-10 border-surface-variant hover:border-primary soft-gradient',
            'eyebrow' => 'text-on-primary-container',
            'title' => 'text-headline-md text-on-surface',
            'tagline' => 'text-lg text-on-surface-variant',
            'body' => 'text-body-md text-on-surface-variant',
        ],
        'dark' => [
            'card' => 'min-h-[340px] p-8 md:p-10 border-primary bg-primary text-on-primary',
            'eyebrow' => 'text-primary-fixed',
            'title' => 'text-headline-md text-on-primary',
            'tagline' => 'text-lg text-primary-fixed',
            'body' => 'text-body-md text-primary-fixed',
        ],
        'plain' => [
            'card' => 'min-h-[260px] p-8 border-surface-variant hover:border-primary bg-surface hover:bg-surface-container-low',
            'eyebrow' => 'text-secondary',
            'title' => 'text-2xl text-on-surface',
            'tagline' => 'text-base text-on-surface-variant',
            'body' => 'text-sm leading-6 text-on-surface-variant',
        ],
    ];

    $features = [
        [
            'variant' => 'wide', 'col' => 'md:col-span-8',
            'eyebrow' => 'Hisab, bukan sekadar tabel',
            'title' => 'Awal bulan Hijriyah',
            'tagline' => 'Ijtima\', tinggi hilal, dan kesimpulan kriteria.',
            'body' => 'Menghitung ijtima\', ghurub, tinggi hilal mar\'i, elongasi, dan mukuts untuk bulan Hijriyah terdekat, lengkap dengan kesimpulan kriteria Neo-MABIMS dan ekspor ke PDF. Tersedia dua metode hisab: ephemeris modern, dan kitab klasik Ad-Durrul Aniq sebagai pembanding.',
            'tags' => ['Neo-MABIMS', 'Ephemeris', 'Ad-Durrul Aniq', 'Ekspor PDF'],
        ],
        [
            'variant' => 'dark', 'col' => 'md:col-span-4',
            'eyebrow' => 'Pandu ibadah Anda',
            'title' => 'Arah kiblat',
            'tagline' => 'Kompas yang tahu kapan sudah pas.',
            'body' => 'Kompas mengikuti arah HP dan berubah warna saat sejajar dengan kiblat. Sudutnya bisa dibuka rinciannya, menurut rumus segitiga bola.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4',
            'title' => 'Waktu sholat',
            'tagline' => 'Metode hisab yang Anda pilih.',
            'body' => 'Pilih metode perhitungan (Kemenag RI, MWL, ISNA, dan lainnya) dan kota. Jadwal bulanan bisa dicetak ke PDF, dan adzan berbunyi sesuai waktunya.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4',
            'title' => 'Fase Bulan',
            'tagline' => 'Bulan malam ini, sesuai aslinya.',
            'body' => 'Ilustrasi fase saat ini dari tekstur foto Bulan, beserta persen tersinari, jarak, terbit dan terbenam, dan jadwal empat fase berikutnya.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4',
            'title' => 'Gerhana dan okultasi',
            'tagline' => 'Terlihat dari tempat Anda atau tidak.',
            'body' => 'Lima gerhana Bulan dan lima gerhana Matahari terdekat, dengan status visibilitas dari lokasi Anda. Ada juga konjungsi Bulan dan Venus.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-6',
            'title' => 'Peta visibilitas hilal',
            'tagline' => 'Dunia dalam satu peta.',
            'body' => 'Peta dunia yang menandai wilayah mana yang hisabnya memenuhi kriteria Neo-MABIMS (hijau) dan mana yang belum (merah) untuk bulan Hijriyah terdekat. Untuk Indonesia, hisab nasional dihitung di beberapa titik markaz.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-6',
            'title' => 'Kalender dan konversi tanggal',
            'tagline' => 'Masehi dan Hijriyah berdampingan.',
            'body' => 'Kalender bulanan dengan hari besar Islam, libur nasional, dan fenomena astronomi, serta konverter tanggal dua arah. Konverter memakai kalender tabular, jadi bisa selisih satu sampai dua hari dari hasil rukyat.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-12',
            'eyebrow' => 'Teman ibadah sehari-hari',
            'title' => 'Selain falak',
            'tagline' => 'Yang sering dibutuhkan, tanpa pindah aplikasi.',
            'body' => 'Al-Qur\'an 114 surah dengan transliterasi, terjemahan, dan audio per ayat. Doa dan dzikir pagi petang. Kalkulator zakat fitrah, mal, dan profesi. Masjid terdekat, tasbih digital, jadwal imsakiyah, peringatan hari wafat, dan kalkulator scientific.',
        ],
    ];

    $principles = [
        ['Bisa dipertanggungjawabkan.', 'Setiap sudut dan derajat punya rinciannya, supaya bisa diperiksa secara ilmiah maupun syar\'i.'],
        ['Tradisi dan teknologi berjalan bersama.', 'Kitab klasik hisab dan ephemeris modern dipakai berdampingan, bukan saling menggantikan.'],
        ['Ramah untuk siapa saja.', 'Ilmu falak yang teknis dibuat mudah diakses oleh santri maupun masyarakat awam.'],
        ['Perhitungan di perangkat.', 'Hisab dikerjakan di HP, tidak bergantung pada panggilan jaringan.'],
    ];
@endphp
<x-layout-main title="Al-Kaukaba – Karya" active="karya" description="Al-Kaukaba: aplikasi Android ilmu falak untuk jadwal sholat, arah kiblat, awal bulan Hijriyah, fase Bulan, dan gerhana. Sudah tersedia di Google Play.">

    {{-- Hero --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 pt-10 pb-16 md:pb-20">
        <a href="{{ url('/#karya') }}" class="inline-block mb-10 font-manrope text-label-caps uppercase text-tertiary hover:text-primary transition-colors duration-200">&larr; Semua karya</a>

        <div class="flex flex-col md:flex-row gap-12 md:gap-16 items-center">
            <div class="md:w-1/2 space-y-6">
                <span class="inline-block px-3 py-1 bg-sage-pastel/60 text-on-primary-container rounded font-manrope text-label-caps uppercase tracking-widest">Karya &middot; {{ $project['rooms'] }}</span>
                <h1 class="font-serif-display text-[48px] leading-[56px] md:text-[72px] md:leading-[84px] tracking-[-0.02em] text-on-surface">{{ $project['name'] }}</h1>
                <p class="font-serif-display italic text-2xl text-on-surface-variant leading-9">{{ $project['tagline'] }}</p>
                <p class="font-manrope text-body-lg text-on-surface-variant max-w-xl">Aplikasi Android ilmu falak dari Lembaga Studi Al-Kaukaba, yang saya kembangkan bersama tim kecil. Ia menyatukan jadwal sholat, arah kiblat, awal bulan Hijriyah, fase Bulan, dan gerhana, supaya ketelitian ilmu falak hadir lebih ramah dan mudah diakses.</p>
                <ul class="flex flex-wrap gap-2">
                    <li class="font-manrope text-label-caps rounded px-3 py-1 bg-primary text-on-primary">{{ $project['status_label'] }}</li>
                    @foreach ($project['tech'] as $tech)
                        <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">{{ $tech }}</li>
                    @endforeach
                </ul>
                <div class="pt-2 flex flex-col sm:flex-row gap-4">
                    <a href="{{ $playUrl }}" target="_blank" rel="noopener" class="bg-primary text-on-primary px-8 py-3 rounded font-manrope text-label-caps uppercase hover:bg-on-primary-container transition-colors duration-300 text-center">Unduh di Google Play &rarr;</a>
                    <a href="#layar" class="border border-primary text-primary px-8 py-3 rounded font-manrope text-label-caps uppercase hover:bg-sage-pastel/20 transition-colors duration-300 text-center">Lihat tangkapan layar</a>
                </div>
            </div>

            <div class="md:w-1/2 w-full soft-gradient border border-surface-variant rounded-xl ambient-glow px-6 py-10 md:px-8 md:py-12 flex justify-center items-start gap-6">
                @foreach (array_slice($project['screens'], 0, 2) as $i => $screen)
                    <div class="w-1/2 max-w-[200px] rounded-2xl border border-outline-variant overflow-hidden bg-white ambient-glow {{ $i === 1 ? 'mt-16' : '' }}">
                        <img src="{{ \App\Support\Projects::imageUrl($screen['file']) }}" alt="{{ $screen['alt'] }}" width="540" height="960" class="block w-full h-auto">
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

    {{-- Latar belakang --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <div class="flex flex-col md:flex-row gap-8 md:gap-16">
            <h2 class="md:w-1/3 font-serif-display text-headline-md text-on-surface">Kenapa aplikasi ini ada</h2>
            <div class="md:w-2/3 space-y-5">
                <p class="font-manrope text-body-md text-on-surface-variant">Al-Kaukaba sejatinya adalah lembaga studi yang didirikan oleh guru sekaligus &ldquo;pak lek&rdquo; saya, KH M Khoirul Anam, sebagai pusat pendalaman ilmu falak. Saya santri angkatan pertamanya. Dari sana kami belajar bahwa ilmu falak bukan hanya soal menghitung angka, melainkan soal membaca tanda-tanda kebesaran Sang Pencipta di jagat raya.</p>
                <p class="font-serif-display italic text-2xl text-on-surface leading-9">Bagaimana jika ketelitian ilmu falak yang sangat teknis itu bisa hadir lebih ramah, dan dibawa ke mana-mana di dalam genggaman?</p>
                <p class="font-manrope text-body-md text-on-surface-variant">Aplikasi ini diluncurkan di Markaz Rukyah Tanjung Kodok, Lamongan, pada 29 Sya&rsquo;ban 1447 H. <a href="https://jatim.antaranews.com/berita/1036450/lamongan-luncurkan-aplikasi-hisab-dukung-akurasi-rukyat" target="_blank" rel="noopener" class="underline hover:text-primary">Beritanya dimuat Antara Jatim</a>. Kisah pembuatannya saya tulis di <a href="{{ url('/al-kaukaba-ikhtiar-mendekatkan-langit-ke-dalam-genggaman') }}" class="underline hover:text-primary">jurnal</a>, dan perjalanan rilisnya di Play Store ada di <a href="{{ url('/menavigasi-arsitektur-rilis-aplikasi-falak-al-kaukaba-sebagai-monumen-pembelajaran-bagi-software-developer-di-labirin-google-play-store') }}" class="underline hover:text-primary">tulisan ini</a>.</p>
            </div>
        </div>
    </section>

    <hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

    {{-- Fitur --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <div class="mb-12">
            <h2 class="font-serif-display text-headline-md text-on-surface mb-2">Yang bisa dilakukan</h2>
            <p class="font-manrope text-body-md text-on-surface-variant max-w-2xl">Perhitungan falak yang menjadi inti aplikasi, ditambah beberapa pendamping ibadah sehari-hari.</p>
        </div>

        <div class="grid grid-cols-12 gap-8">
            @foreach ($features as $feature)
                @php $v = $variants[$feature['variant']]; @endphp
                <article class="bento-card rounded-xl border col-span-12 {{ $feature['col'] }} {{ $v['card'] }} flex flex-col justify-end gap-8">
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

    {{-- Prinsip --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <h2 class="font-serif-display text-headline-md text-on-surface mb-12">Prinsip yang dipegang</h2>
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
        </div>

        <div class="flex flex-wrap justify-center gap-8">
            @foreach ($project['screens'] as $screen)
                <figure class="w-full max-w-[280px] space-y-4">
                    <div class="rounded-[20px] border border-outline-variant overflow-hidden bg-white ambient-glow">
                        <img src="{{ \App\Support\Projects::imageUrl($screen['file']) }}" alt="{{ $screen['alt'] }}" width="540" height="960" loading="lazy" class="block w-full h-auto">
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
                <h2 class="font-serif-display text-headline-md text-on-surface">Sudah tersedia di Google Play</h2>
                <p class="font-manrope text-body-md text-on-surface-variant">Al-Kaukaba sudah bisa diunduh gratis dan terus diperbarui. Masukan dari pengguna adalah kompas bagi kami, jadi kalau ada fitur falak yang Anda butuhkan, kabari saya. Kebijakan privasinya ada di <a href="{{ url('/privacy-policy-al-kaukaba') }}" class="underline hover:text-primary">halaman ini</a>.</p>
            </div>
            <a href="{{ $playUrl }}" target="_blank" rel="noopener" class="shrink-0 bg-primary text-on-primary px-8 py-3 rounded font-manrope text-label-caps uppercase hover:bg-on-primary-container transition-colors duration-300 text-center">Unduh di Google Play &rarr;</a>
        </div>
    </section>

</x-layout-main>
