@php
    $count = \App\Support\Posts::roomCounts()[$room] ?? 0;
    $dark = $dark ?? false;
@endphp
<div class="flex items-center justify-between gap-3 pt-4 mt-4 border-t {{ $dark ? 'border-white/20' : 'border-surface-variant' }}">
    @if ($count > 0)
        <a href="{{ url('/journal?ruang=' . $room) }}" class="font-manrope text-label-caps uppercase {{ $dark ? 'text-on-primary hover:text-primary-fixed' : 'text-primary hover:text-on-primary-container' }} transition-colors duration-200">{{ $count }} tulisan di Journal &rarr;</a>
    @else
        <span class="font-manrope text-label-caps uppercase {{ $dark ? 'text-primary-fixed-dim' : 'text-outline' }}">Belum ada tulisan</span>
    @endif
</div>
