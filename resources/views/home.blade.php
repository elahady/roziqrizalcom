<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Roziq Rizal Al Ahadi &ndash; Denah Hidup</title>
    <meta name="description" content="Satu orang, sembilan ruang, satu sistem. Denah hidup Muhammad Roziq Rizal Al Ahadi.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-on-background font-manrope antialiased">

<header class="max-w-[1200px] mx-auto px-6 md:px-16 pt-20 md:pt-28 pb-12">
    <div class="flex flex-col md:flex-row gap-10 items-center">
        <div class="md:w-3/5 space-y-6 text-center md:text-left">
            <span class="inline-block px-3 py-1 bg-sage-pastel/50 text-on-primary-container rounded font-manrope text-label-caps tracking-widest">Denah Hidup &mdash; Lembar 01/01</span>
            <h1 class="font-serif-display text-headline-lg-mobile md:text-display-lg text-on-surface leading-tight">
                Muhammad Roziq<br>Rizal Al Ahadi
            </h1>
            <p class="font-manrope text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
                Satu orang, sembilan ruang, satu sistem &mdash; Investor, Leader, Servant, Husband, Observer, Trader, Gamer, Reader, dan ruang di antaranya.
            </p>
            <div class="pt-4 flex flex-col sm:flex-row gap-4 items-center md:items-start justify-center md:justify-start">
                <a href="#ruang" class="bg-primary text-on-primary px-8 py-3 rounded font-manrope text-label-caps hover:bg-on-primary-container transition-colors duration-300 w-full sm:w-auto text-center">
                    Jelajahi Ruang
                </a>
                <a href="{{ url('/journal') }}" class="border border-primary text-primary px-8 py-3 rounded font-manrope text-label-caps hover:bg-sage-pastel/20 transition-colors duration-300 w-full sm:w-auto text-center">
                    Baca Jurnal
                </a>
            </div>
        </div>
        <div class="md:w-2/5 relative">
            <div class="w-full aspect-square rounded-full soft-gradient opacity-60 mix-blend-multiply absolute -right-8 -top-8 filter blur-3xl"></div>
            <div class="relative z-10 w-full aspect-square rounded-full soft-gradient ambient-glow border border-surface-variant flex items-center justify-center">
                <span class="material-symbols-outlined text-primary" style="font-size:88px;">architecture</span>
            </div>
        </div>
    </div>
</header>

<hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

<main class="max-w-[1200px] mx-auto px-6 md:px-16 py-16" id="ruang">
    <div class="mb-12">
        <h2 class="font-serif-display text-headline-md text-on-surface mb-2">Learn. Build. Serve. Observe.</h2>
        <p class="font-manrope text-body-md text-on-surface-variant max-w-2xl">To learn, to build, to serve, to observe &mdash; not four separate roles, but one discipline of presence: showing up fully wherever I stand, letting each space quietly teach the others, until what remains is simply one life, coherently lived.</p>
    </div>

    <div class="grid grid-cols-12 gap-8">
        @include('rooms.02-kerja')
        @include('rooms.00-antara')
        @include('rooms.01-finansial')
        @include('rooms.03-takmir')
        @include('rooms.04-angkasa')
        @include('rooms.05-perpustakaan')
        @include('rooms.06-permainan')
        @include('rooms.07-taktik')
        @include('rooms.08-hati')
    </div>
</main>

<footer class="bg-surface-container border-t border-secondary/10 py-16 md:py-24 w-full">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16 flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="font-serif-display text-headline-lg-mobile md:text-headline-md text-on-surface font-bold text-center md:text-left">
            Muhammad Roziq Rizal Al Ahadi
        </div>
        <div class="flex flex-wrap justify-center gap-8">
            <a class="font-manrope text-label-caps text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/journal') }}">Journal</a>
            <a class="font-manrope text-label-caps text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/about-me') }}">About</a>
            <a class="font-manrope text-label-caps text-on-surface-variant hover:text-primary transition-colors duration-200" href="https://www.linkedin.com/in/roziq-rizal/" target="_blank" rel="noopener">LinkedIn</a>
        </div>
        <div class="font-manrope text-body-md text-secondary text-center md:text-right">
            &copy; {{ date('Y') }} Muhammad Roziq Rizal Al Ahadi. Lead. Build. Serve. Observe.
        </div>
    </div>
</footer>

</body>
</html>
