<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Roziq Rizal Al Ahadi &ndash; Denah Hidup</title>
    <meta name="description" content="Satu orang, sembilan ruang, satu sistem. Denah hidup Muhammad Roziq Rizal Al Ahadi.">
    @include('partials.favicon')
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
            <p class="font-serif-display italic text-body-lg text-on-surface-variant max-w-2xl leading-relaxed text-right" dir="rtl" lang="ar">
                إِنَّ لِرَبِّكَ عَلَيْكَ حَقًّا، وَلِنَفْسِكَ عَلَيْكَ حَقًّا، وَلِأَهْلِكَ عَلَيْكَ حَقًّا، فَأَعْطِ كُلَّ ذِي حَقٍّ حَقَّهُ
            </p>
            <p class="font-manrope text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
                &ldquo;Sesungguhnya Rabbmu memiliki hak atasmu, dirimu memiliki hak atasmu, dan keluargamu memiliki hak atasmu. Maka berikanlah hak kepada setiap yang memiliki hak.&rdquo;
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
            <div class="relative z-10 w-full aspect-square rounded-full overflow-hidden soft-gradient ambient-glow border border-surface-variant">
                <img src="{{ asset('images/potret-elahady-hero.jpg') }}" alt="Potret ilustrasi Muhammad Roziq Rizal Al Ahadi, dibuat dengan AI" width="800" height="800" class="w-full h-full object-cover mix-blend-multiply">
            </div>
        </div>
    </div>
</header>

<hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

<main class="max-w-[1200px] mx-auto px-6 md:px-16 py-16" id="ruang">
    <div class="mb-12">
        <h2 class="font-serif-display text-headline-md text-on-surface mb-2">Tawazun. Tasammuh. Consistent. Persistent.</h2>
        <p class="font-manrope text-body-md text-on-surface-variant max-w-2xl">Orang yang dengan sengaja berusaha membangun sistem di tiap area hidupnya, alih-alih menjalani hidup secara acak.</p>
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

<hr class="border-t border-surface-variant my-4 opacity-50 max-w-[1200px] mx-auto">

<section class="max-w-[1200px] mx-auto px-6 md:px-16 py-16" id="karya">
    <div class="mb-12">
        <h2 class="font-serif-display text-headline-md text-on-surface mb-2">Karya</h2>
        <p class="font-manrope text-body-md text-on-surface-variant max-w-2xl">Sistem yang saya bangun untuk menunaikan hak setiap ruang.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach (\App\Support\Projects::all() as $slug => $project)
            @include('partials.project-card', ['slug' => $slug, 'project' => $project])
        @endforeach
    </div>
</section>

@include('partials.site-footer')

</body>
</html>
