@props(['slug', 'post'])
@php
    $room = \App\Support\Rooms::find($post['room']);
    $series = isset($post['series']) ? \App\Support\Posts::SERIES[$post['series']] : null;
    [$older, $newer] = \App\Support\Posts::neighbours($slug);
    $roomUrl = url('/journal?ruang=' . $room['slug']);
    $neighbourBase = 'block flex-1 basis-[280px] min-w-0 border border-outline-variant rounded-lg px-6 py-5 text-on-surface hover:border-primary hover:bg-surface-container-low transition-colors duration-200';
@endphp
<x-layout :title="$post['title']" active="journal" :description="$post['excerpt']">

    <article class="max-w-3xl mx-auto px-6 pt-12 md:pt-14 pb-24">
        <nav aria-label="Jejak halaman" class="flex flex-wrap gap-2 font-manrope text-label-caps uppercase text-outline">
            <a href="{{ url('/journal') }}" class="hover:text-primary transition-colors duration-200">Journal</a>
            <span aria-hidden="true">/</span>
            <a href="{{ $roomUrl }}" class="text-primary hover:underline">{{ $room['number'] }} &middot; {{ $room['name'] }}</a>
        </nav>

        <h1 class="mt-7 mb-5 font-serif-display text-[32px] leading-10 md:text-[44px] md:leading-[56px] tracking-tight text-on-surface">{{ $post['title'] }}</h1>

        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 pb-8 border-b border-surface-variant font-manrope text-label-caps uppercase text-tertiary">
            <span>{{ \App\Support\Posts::dateLabel($post) }}</span>
            <span aria-hidden="true" class="text-outline-variant">&bull;</span>
            <span>Muhammad Roziq Rizal Al Ahadi</span>
            @if ($series)
                <span aria-hidden="true" class="text-outline-variant">&bull;</span>
                <a href="{{ $roomUrl }}" class="inline-flex rounded border border-outline-variant px-2.5 py-1 text-secondary hover:border-primary hover:text-primary transition-colors duration-200">{{ $series['label'] }}: {{ $series['title'] }}</a>
            @endif
        </div>

        <div class="article-body pt-10">
            {{ $slot }}
        </div>

        <aside class="mt-14 flex flex-wrap items-center justify-between gap-4 rounded-xl bg-surface-container-low px-7 py-6" aria-label="Ruang asal tulisan ini">
            <div>
                <span class="font-manrope text-label-caps uppercase text-secondary">Ruang asal tulisan ini</span>
                <div class="mt-1 font-serif-display text-[22px] leading-8">{{ $room['number'] }} &middot; {{ $room['name'] }}</div>
                <div class="font-serif-display italic leading-[26px] text-on-surface-variant">{{ $room['tagline'] }}</div>
            </div>
            <a href="{{ $roomUrl }}" class="font-manrope text-label-caps uppercase text-primary hover:text-on-primary-container transition-colors duration-200">Semua tulisan {{ $room['name'] }} &rarr;</a>
        </aside>

        @if ($older || $newer)
            <nav class="mt-8 flex flex-wrap gap-4" aria-label="Tulisan lain di ruang ini">
                @if ($older)
                    <a href="{{ url('/' . $older['slug']) }}" rel="prev" class="{{ $neighbourBase }}">
                        <span class="font-manrope text-label-caps uppercase text-outline">&larr; Lebih lama</span>
                        <span class="mt-1.5 block font-serif-display text-[17px] leading-[26px]">{{ $older['title'] }}</span>
                    </a>
                @endif
                @if ($newer)
                    <a href="{{ url('/' . $newer['slug']) }}" rel="next" class="{{ $neighbourBase }} text-right sm:ml-auto">
                        <span class="font-manrope text-label-caps uppercase text-outline">Lebih baru &rarr;</span>
                        <span class="mt-1.5 block font-serif-display text-[17px] leading-[26px]">{{ $newer['title'] }}</span>
                    </a>
                @endif
            </nav>
        @endif

        @isset($comments)
            <div class="mt-14">
                {{ $comments }}
            </div>
        @endisset
    </article>

</x-layout>
