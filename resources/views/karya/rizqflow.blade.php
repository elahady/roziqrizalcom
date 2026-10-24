@php
    $facts = [
        ['Tahap sekarang', 'Validasi minat, sebelum dibangun penuh'],
        ['Platform rencana', 'Android (Kotlin + Jetpack Compose) dan web dashboard'],
        ['Cocok untuk', 'Siapa pun yang ingin rezekinya mengalir sesuai hak, bukan sekadar tercatat'],
        ['Modul opsional', 'Zakat dan haul Hijriyah — bisa dimatikan bagi yang tidak perlu'],
    ];

    // Ilustrasi konsep alokasi, bukan data atau default sungguhan dari aplikasi.
    $allocationRooms = [
        ['Memberi', 'bg-sage-pastel/60 border-surface-variant text-on-primary-container'],
        ['Diri', 'bg-surface border-surface-variant text-on-surface'],
        ['Keluarga', 'bg-primary border-primary text-on-primary'],
        ['Ruang lain', 'bg-surface border-surface-variant text-on-surface'],
    ];

    // Kelas per varian ditulis utuh supaya terbaca oleh Tailwind.
    $variants = [
        'wide' => [
            'card' => 'min-h-[300px] p-8 md:p-10 border-surface-variant hover:border-primary soft-gradient',
            'platform' => 'text-tertiary',
            'eyebrow' => 'text-on-primary-container',
            'title' => 'text-headline-md text-on-surface',
            'tagline' => 'text-lg text-on-surface-variant',
            'body' => 'text-body-md text-on-surface-variant',
        ],
        'dark' => [
            'card' => 'min-h-[300px] p-8 md:p-10 border-primary bg-primary text-on-primary',
            'platform' => 'text-primary-fixed',
            'eyebrow' => 'text-primary-fixed',
            'title' => 'text-headline-md text-on-primary',
            'tagline' => 'text-lg text-primary-fixed',
            'body' => 'text-body-md text-primary-fixed',
        ],
        'plain' => [
            'card' => 'min-h-[220px] p-8 border-surface-variant hover:border-primary bg-surface hover:bg-surface-container-low',
            'platform' => 'text-tertiary',
            'eyebrow' => 'text-secondary',
            'title' => 'text-2xl text-on-surface',
            'tagline' => 'text-base text-on-surface-variant',
            'body' => 'text-sm leading-6 text-on-surface-variant',
        ],
    ];

    $features = [
        [
            'variant' => 'wide', 'col' => 'md:col-span-7', 'platform' => 'Android · rencana',
            'eyebrow' => 'Tanpa pindah manual',
            'title' => 'Alokasi otomatis',
            'tagline' => 'Rezeki mengalir sendiri ke ruang-ruangnya.',
            'body' => 'Catat sekali, lalu rezeki dialirkan ke ruang-ruang sesuai aturan yang Anda atur sendiri — persentase atau prioritas rupiah — bukan dipindah manual satu per satu.',
        ],
        [
            'variant' => 'dark', 'col' => 'md:col-span-5', 'platform' => 'Modul opsional',
            'eyebrow' => 'Pembeda utama',
            'title' => 'Zakat & haul',
            'tagline' => 'Nisab dan haul Hijriyah otomatis.',
            'body' => 'Terhubung ke profil harta Anda. Modul ini bisa dimatikan tanpa merusak aplikasi — inti Rizqflow tetap universal bagi siapa pun.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4', 'platform' => 'Android · rencana',
            'title' => 'Offline-first & aman',
            'tagline' => 'Datamu tetap di HP-mu.',
            'body' => 'Berfungsi penuh tanpa internet. Backup wajib terenkripsi, PIN dan biometrik melindungi akses sebelum data apa pun terkirim ke mana-mana.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4', 'platform' => 'Android · rencana',
            'title' => 'Utang-piutang & tagihan',
            'tagline' => 'Dicatat, bukan dihafalkan.',
            'body' => 'Siapa berutang ke Anda, dan sebaliknya, lengkap pengingat jatuh tempo — terhubung ke perhitungan zakat sebagai saran, bukan otomatis.',
        ],
        [
            'variant' => 'plain', 'col' => 'md:col-span-4', 'platform' => 'Prinsip',
            'title' => 'Tenang, bukan panik',
            'tagline' => 'Peringatan lembut, tidak memblokir.',
            'body' => 'Status finansial selalu ditampilkan dengan ikon dan teks, bukan cuma warna merah-hijau yang menghakimi.',
        ],
    ];

    $principles = [
        ['Uang = bilangan bulat.', 'Tidak pernah ada floating point — saldo Anda tidak boleh meleset satu rupiah pun karena pembulatan.'],
        ['Satu lapisan penguncian.', 'Semua fitur Pro lewat satu lapisan entitlement, bukan pengecekan yang tersebar dan mudah bocor atau terlewat.'],
        ['Inti universal, Islami opsional.', 'Penamaan di dalam kodenya netral; modul zakat/haul bisa dimatikan tanpa merusak aplikasi bagi yang tidak perlu.'],
        ['Selalu gratis untuk yang inti.', 'Keamanan, ekspor data, dan dasar zakat tidak pernah dikunci atau berbayar. Tanpa iklan, di versi apa pun.'],
    ];
@endphp
<x-layout title="Rizqflow – Karya" active="karya" description="Rizqflow: aplikasi finansial berbasis hak, lahir dari jurnal Ruang Finansial sendiri. Daftar ke daftar tunggu sebelum versi uji coba dibuka.">

    {{-- Hero + form daftar tunggu --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 pt-10 pb-16 md:pb-20">
        <a href="{{ url('/#karya') }}" class="inline-block mb-10 font-manrope text-label-caps uppercase text-tertiary hover:text-primary transition-colors duration-200">&larr; Semua karya</a>

        <div class="flex flex-col md:flex-row gap-12 md:gap-16 items-center">
            <div class="md:w-1/2 space-y-6">
                <span class="inline-block px-3 py-1 bg-sage-pastel/60 text-on-primary-container rounded font-manrope text-label-caps uppercase tracking-widest">Karya &middot; {{ $project['rooms'] }}</span>
                <h1 class="font-serif-display text-[48px] leading-[56px] md:text-[72px] md:leading-[84px] tracking-[-0.02em] text-on-surface">{{ $project['name'] }}</h1>
                <p class="font-serif-display italic text-2xl text-on-surface-variant leading-9">{{ $project['tagline'] }}</p>
                <p class="font-manrope text-body-lg text-on-surface-variant max-w-xl">Aplikasi finansial yang saya bangun dari jurnal Ruang Finansial sendiri. Setiap rezeki yang masuk dialirkan ke ruang-ruang — Memberi, Diri, Keluarga, dan peran lain yang Anda pilih — lewat aturan alokasi, lengkap dengan modul zakat dan haul yang bisa dimatikan bagi yang tidak perlu.</p>
                <ul class="flex flex-wrap gap-2">
                    <li class="font-manrope text-label-caps rounded px-3 py-1 bg-sage-pastel text-on-primary-container">{{ $project['status_label'] }}</li>
                    @foreach ($project['tech'] as $tech)
                        <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">{{ $tech }}</li>
                    @endforeach
                </ul>

                <div id="daftar-tunggu" class="pt-4 space-y-3">
                    @if (session('waitlist_status') === 'baru')
                        <p class="font-manrope text-body-md text-on-primary-container bg-sage-pastel/50 border border-surface-variant rounded-lg px-4 py-3">Terima kasih, Anda sudah masuk daftar tunggu. Saya hubungi lewat email ini begitu versi uji coba dibuka.</p>
                    @elseif (session('waitlist_status') === 'sudah-terdaftar')
                        <p class="font-manrope text-body-md text-on-primary-container bg-sage-pastel/50 border border-surface-variant rounded-lg px-4 py-3">Email ini sudah ada di daftar tunggu — Anda akan dihubungi begitu saatnya tiba.</p>
                    @else
                        <form method="POST" action="{{ route('waitlist.store', 'rizqflow') }}" class="flex flex-col sm:flex-row gap-3">
                            @csrf
                            <label for="waitlist-email" class="sr-only">Alamat email</label>
                            <input id="waitlist-email" type="email" name="email" required maxlength="255" placeholder="nama@email.com"
                                   class="w-full sm:flex-1 rounded border border-outline-variant bg-surface px-4 py-3 font-manrope text-body-md text-on-surface placeholder:text-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                            <button type="submit" class="shrink-0 bg-primary text-on-primary px-8 py-3 rounded font-manrope text-label-caps uppercase hover:bg-on-primary-container transition-colors duration-300">Daftar jadi penguji pertama &rarr;</button>
                        </form>
                        @error('email')
                            <p class="font-manrope text-sm text-error">{{ $message }}</p>
                        @enderror
                        <p class="font-manrope text-sm text-tertiary">Belum ada aplikasi untuk diunduh. Ini daftar tunggu untuk dihubungi begitu versi uji coba dibuka.</p>
                    @endif
                </div>

                <a href="#konsep" class="inline-block font-manrope text-label-caps uppercase text-primary hover:text-on-primary-container transition-colors duration-200">Lihat konsepnya &darr;</a>
            </div>

            <div class="md:w-1/2 w-full soft-gradient border border-surface-variant rounded-xl ambient-glow px-8 py-10 md:py-12 flex flex-col items-center gap-6" aria-hidden="true">
                <div class="text-center space-y-1">
                    <span class="font-manrope text-label-caps uppercase text-tertiary">Rezeki masuk</span>
                    <p class="font-serif-display text-3xl text-on-surface">Rp 5.000.000</p>
                </div>
                <span class="font-serif-display text-2xl text-tertiary">&darr;</span>
                <div class="w-full max-w-[320px] grid grid-cols-2 gap-3">
                    @foreach ($allocationRooms as [$name, $classes])
                        <div class="rounded-lg border px-4 py-3 text-center {{ $classes }}">
                            <p class="font-manrope text-label-caps uppercase opacity-80">{{ $name }}</p>
                        </div>
                    @endforeach
                </div>
                <p class="font-manrope text-xs text-tertiary text-center max-w-[260px]">Ilustrasi konsep alokasi — nama ruang dan pembagiannya diatur sendiri, bukan tangkapan layar aplikasi</p>
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
                <p class="font-manrope text-body-md text-on-surface-variant">Aplikasi pencatat uang kebanyakan cuma menjawab "ke mana uang saya pergi" — bukan "apakah rezeki ini sudah menunaikan haknya". Saya menulis jurnal Ruang Finansial sendiri bertahun-tahun, dan pertanyaan yang selalu kembali bukan soal kategori pengeluaran, melainkan pembagian: berapa yang sudah mengalir ke Memberi, ke Diri, ke Keluarga — dan berapa yang masih tertahan begitu saja.</p>
                <p class="font-serif-display italic text-2xl text-on-surface leading-9">Yang saya butuhkan bukan pencatat uang lagi, melainkan sistem yang memperlakukan rezeki sebagai hak yang harus ditunaikan ke tempatnya.</p>
                <p class="font-manrope text-body-md text-on-surface-variant">Sebelum menghabiskan waktu membangun semuanya, saya ingin tahu dulu: apakah ini juga masalah Anda — bukan cuma saya.</p>
            </div>
        </div>
    </section>

    <hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

    {{-- Konsep & fitur yang direncanakan --}}
    <section id="konsep" class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <div class="mb-12">
            <h2 class="font-serif-display text-headline-md text-on-surface mb-2">Yang direncanakan bisa dilakukan</h2>
            <p class="font-manrope text-body-md text-on-surface-variant max-w-2xl">Masih dalam tahap validasi minat — belum ada yang dibangun penuh. Label di pojok kartu menunjukkan ke platform mana rencananya mengarah.</p>
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
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

    {{-- Prinsip desain --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 py-16 md:py-20">
        <h2 class="font-serif-display text-headline-md text-on-surface mb-12">Prinsip yang tidak boleh dilanggar</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-12">
            @foreach ($principles as [$heading, $text])
                <div class="border-t border-outline-variant pt-6 space-y-2">
                    <h3 class="font-serif-display italic text-[22px] leading-8 text-on-surface">{{ $heading }}</h3>
                    <p class="font-manrope text-body-md text-on-surface-variant">{{ $text }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Status dan ajakan --}}
    <section class="max-w-[1200px] mx-auto px-6 md:px-16 pb-20 md:pb-24">
        <div class="bg-sage-pastel/50 border border-surface-variant rounded-xl p-8 md:p-12 flex flex-col md:flex-row gap-8 md:items-center justify-between">
            <div class="space-y-3 max-w-xl">
                <span class="block font-manrope text-label-caps uppercase text-on-primary-container">Status</span>
                <h2 class="font-serif-display text-headline-md text-on-surface">Validasi minat dulu, baru dibangun penuh</h2>
                <p class="font-manrope text-body-md text-on-surface-variant">Rizqflow lahir dari jurnal pribadi saya sendiri — bukan riset pasar dulu, fitur belakangan. Daftar di bawah untuk jadi yang pertama tahu saat versi uji coba (closed beta) dibuka, dan ikut membentuk fitur apa yang benar-benar dibangun.</p>
            </div>
            <a href="#daftar-tunggu" class="shrink-0 bg-primary text-on-primary px-8 py-3 rounded font-manrope text-label-caps uppercase hover:bg-on-primary-container transition-colors duration-300 text-center">Daftar ke daftar tunggu &rarr;</a>
        </div>
    </section>

</x-layout>
