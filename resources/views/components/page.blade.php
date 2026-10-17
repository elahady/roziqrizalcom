@props(['title', 'eyebrow' => 'Profil', 'active' => 'profil', 'meta' => null, 'description' => null])
<x-layout :title="$title" :active="$active" :description="$description">

    <article class="max-w-3xl mx-auto px-6 pt-14 md:pt-[72px] pb-24">
        @if ($eyebrow)
            <span class="font-manrope text-label-caps uppercase text-primary">{{ $eyebrow }}</span>
        @endif

        <h1 class="mt-5 mb-4 font-serif-display text-[32px] leading-10 md:text-5xl md:leading-[58px] tracking-tight text-on-surface">{{ $title }}</h1>

        @if ($meta)
            <p class="font-manrope text-label-caps uppercase text-tertiary">{{ $meta }}</p>
        @endif

        <div class="article-body mt-10">
            {{ $slot }}
        </div>
    </article>

</x-layout>
