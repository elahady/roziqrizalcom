@php
    $items = [
        'denah' => ['Denah', url('/')],
        'karya' => ['Karya', url('/#karya')],
        'journal' => ['Journal', url('/journal')],
    ];

    // Halaman profil: [label, url, anak dari item di atasnya]; 'sep' = garis pemisah.
    $profile = [
        ['Tentang saya', url('/about-me'), false],
        'sep',
        ["I'm Project Manager", url('/im-project-manager'), false],
        ['My Management Playbook', url('/my-management-playbook'), true],
        ["I'm Tech Enthusiast", url('/it-enthusiast'), false],
        ["I'm Market Observer", url('/market-observer'), false],
        'sep',
        ['Hajj 2026', url('/haji-2026'), false],
    ];

    $linkBase = 'font-manrope text-label-caps uppercase py-1.5 border-b-2 transition-colors duration-200';
@endphp
<header class="border-b border-surface-variant/70 bg-background">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16 py-5 flex flex-wrap items-center justify-between gap-x-6 gap-y-3">
        <a href="{{ url('/') }}" class="font-serif-display text-xl text-on-surface hover:text-primary transition-colors duration-200">Muhammad Roziq Rizal Al Ahadi</a>
        <nav class="flex flex-wrap items-center gap-x-8 gap-y-1" aria-label="Menu utama">
            @foreach ($items as $key => [$label, $href])
                @if (($active ?? null) === $key)
                    <a href="{{ $href }}" aria-current="page" class="{{ $linkBase }} text-primary border-primary">{{ $label }}</a>
                @else
                    <a href="{{ $href }}" class="{{ $linkBase }} text-on-surface-variant border-transparent hover:text-primary">{{ $label }}</a>
                @endif
            @endforeach

            <div class="relative group" data-menu>
                <button type="button" aria-haspopup="true" aria-expanded="false" aria-controls="menu-profil" data-menu-toggle
                    class="{{ $linkBase }} cursor-pointer {{ ($active ?? null) === 'profil' ? 'text-primary border-primary' : 'text-on-surface-variant border-transparent hover:text-primary' }}">
                    Profil <span aria-hidden="true">&#9662;</span>
                </button>
                <div id="menu-profil" class="hidden group-hover:block group-focus-within:block group-data-[open]:block static md:absolute md:right-0 md:top-full md:pt-2 md:w-[300px] z-20">
                    <div class="bg-surface-container-lowest border border-surface-variant rounded-xl p-2 ambient-glow">
                        @foreach ($profile as $entry)
                            @if ($entry === 'sep')
                                <div class="h-px bg-surface-variant mx-1 my-1.5"></div>
                            @else
                                <a href="{{ $entry[1] }}" class="block font-manrope text-body-md text-on-surface hover:bg-surface-container-low hover:text-primary rounded-lg py-2.5 {{ $entry[2] ? 'pl-7 pr-3 text-sm' : 'px-3' }}">{{ $entry[0] }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
