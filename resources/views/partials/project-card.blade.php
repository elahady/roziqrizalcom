@php
    $hasPage = isset($project['view']);
    $statusClass = $project['status'] === 'live'
        ? 'bg-primary text-on-primary'
        : 'bg-sage-pastel/60 text-on-primary-container';
@endphp
<article class="bento-card border-surface-variant hover:border-primary bg-surface hover:bg-surface-container-low rounded-xl p-6 md:p-8 flex flex-col gap-6">
    <div class="flex gap-3 overflow-x-auto snap-x snap-mandatory pb-2" tabindex="0" role="group" aria-label="Tangkapan layar {{ $project['name'] }}">
        @foreach ($project['screens'] as $screen)
            <img src="{{ \App\Support\Projects::imageUrl($screen['file']) }}"
                 alt="{{ $screen['alt'] }}"
                 loading="lazy"
                 class="h-72 w-auto shrink-0 snap-start rounded-lg border border-surface-variant">
        @endforeach
    </div>

    <div class="space-y-3">
        <div class="flex flex-wrap items-center gap-3">
            <span class="font-manrope text-label-caps rounded px-3 py-1 {{ $statusClass }}">{{ $project['status_label'] }}</span>
            <span class="font-manrope text-label-caps text-tertiary">{{ $project['rooms'] }}</span>
        </div>
        <h3 class="font-serif-display text-headline-md text-on-surface">{{ $project['name'] }}</h3>
        <p class="font-serif-display italic text-lg text-on-surface-variant">{{ $project['tagline'] }}</p>
        <p class="font-manrope text-body-md text-on-surface-variant">{{ $project['summary'] }}</p>
        <ul class="flex flex-wrap gap-2 pt-1">
            @foreach ($project['tech'] as $tech)
                <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">{{ $tech }}</li>
            @endforeach
        </ul>
    </div>

    @if ($hasPage)
        <a href="{{ url('/karya/' . $slug) }}" class="mt-auto self-start font-manrope text-label-caps text-primary border border-primary rounded px-6 py-3 hover:bg-sage-pastel/20 transition-colors duration-300">
            Lihat karya &rarr;
        </a>
    @endif
</article>
