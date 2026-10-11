@php
    $items = [
        'denah' => ['Denah', url('/')],
        'karya' => ['Karya', url('/#karya')],
        'journal' => ['Journal', url('/journal')],
        'about' => ['About', url('/about-me')],
    ];
@endphp
<header class="border-b border-surface-variant/70 bg-background">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16 py-5 flex flex-wrap items-center justify-between gap-x-6 gap-y-3">
        <a href="{{ url('/') }}" class="font-serif-display text-xl text-on-surface hover:text-primary transition-colors duration-200">Muhammad Roziq Rizal Al Ahadi</a>
        <nav class="flex flex-wrap items-center gap-x-8 gap-y-1" aria-label="Menu utama">
            @foreach ($items as $key => [$label, $href])
                @if (($active ?? null) === $key)
                    <a href="{{ $href }}" aria-current="page" class="font-manrope text-label-caps uppercase text-primary border-b-2 border-primary py-1.5">{{ $label }}</a>
                @else
                    <a href="{{ $href }}" class="font-manrope text-label-caps uppercase text-on-surface-variant hover:text-primary transition-colors duration-200 py-1.5">{{ $label }}</a>
                @endif
            @endforeach
        </nav>
    </div>
</header>
