@php
    $room = \App\Support\Rooms::find($post['room']);
@endphp
<article class="grid grid-cols-1 md:grid-cols-[200px_minmax(0,1fr)] gap-x-10 gap-y-4 py-7 md:py-9 border-t border-surface-variant last:border-b">
    <div class="flex md:flex-col justify-between md:justify-start items-baseline md:items-stretch gap-2">
        <span class="font-manrope text-label-caps uppercase text-tertiary">{{ \App\Support\Posts::dateLabel($post) }}</span>
        <a href="{{ url('/journal?ruang=' . $room['slug']) }}" class="font-manrope text-label-caps uppercase text-primary hover:underline">{{ $room['number'] }} &middot; {{ $room['name'] }}</a>
    </div>
    <div class="min-w-0">
        <h2 class="font-serif-display text-[22px] leading-8 md:text-[26px] md:leading-9 mb-3">
            <a href="{{ url('/' . $slug) }}" class="text-on-surface hover:text-primary transition-colors duration-200">{{ $post['title'] }}</a>
        </h2>
        <p class="font-manrope text-body-md text-on-surface-variant mb-4 line-clamp-3">{{ $post['excerpt'] }}</p>
        <a href="{{ url('/' . $slug) }}" class="font-manrope text-label-caps uppercase text-primary hover:text-on-primary-container transition-colors duration-200">Baca selengkapnya &rarr;</a>
    </div>
</article>
