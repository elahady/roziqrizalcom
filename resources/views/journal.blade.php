@php
    $chipBase = 'inline-flex items-center gap-2 font-manrope text-label-caps uppercase rounded border px-3.5 py-2 transition-colors duration-200';
    $chipOff = 'border-outline-variant text-secondary hover:border-primary hover:text-primary';
    $chipOn = 'border-primary bg-primary text-on-primary hover:bg-on-primary-container hover:border-on-primary-container';
@endphp
<x-layout
    :title="$room ? 'Journal: ' . $room['name'] : 'Journal'"
    active="journal"
    :description="$room ? $room['tagline'] : 'Catatan dari ruang-ruang tempat saya menunaikan hak: uang, kerja, langit, dan pasar.'">

    @if ($room)
        <section class="max-w-[1200px] mx-auto px-6 md:px-16 pt-12 pb-10">
            <a href="{{ url('/journal') }}" class="font-manrope text-label-caps uppercase text-primary hover:text-on-primary-container transition-colors duration-200">&larr; Semua journal</a>

            <div class="mt-6 bg-sage-pastel rounded-xl p-8 md:p-12 flex flex-wrap items-end justify-between gap-x-14 gap-y-6">
                <div class="flex-1 basis-[420px] min-w-0">
                    <span class="font-manrope text-label-caps uppercase text-on-primary-container">{{ $room['number'] }} / {{ $room['name'] }}</span>
                    <p class="mt-3 font-manrope text-label-caps uppercase text-secondary">{{ $room['persona'] }}</p>
                    <h1 class="mt-4 mb-4 font-serif-display text-[40px] leading-[48px] md:text-[56px] md:leading-[64px] tracking-tight text-on-surface">{{ $room['name'] }}</h1>
                    <p class="font-serif-display italic text-xl leading-8 text-on-primary-fixed-variant">{{ $room['tagline'] }}</p>
                </div>
                <div class="flex-[0_1_300px] flex flex-col gap-3">
                    @if ($series)
                        <span class="font-manrope text-label-caps uppercase text-secondary">Seri berjalan</span>
                        <div class="bg-surface-container-lowest border border-outline-variant rounded-lg px-5 py-4">
                            <div class="font-serif-display text-lg leading-7">{{ $series['title'] }}</div>
                            <div class="font-manrope text-sm leading-6 text-on-surface-variant">{{ $series['label'] }} &middot; {{ $series['count'] }} tulisan</div>
                        </div>
                    @endif
                    <a href="{{ url('/#ruang') }}" class="font-manrope text-label-caps uppercase text-primary hover:text-on-primary-container transition-colors duration-200">Kembali ke Denah &rarr;</a>
                </div>
            </div>
        </section>
    @else
        <section class="max-w-[1200px] mx-auto px-6 md:px-16 pt-16 md:pt-20 pb-10">
            <span class="inline-block px-3 py-1 bg-sage-pastel/50 text-on-primary-container rounded font-manrope text-label-caps uppercase tracking-widest">Denah Hidup &mdash; Journal</span>
            <h1 class="mt-6 mb-4 font-serif-display text-[40px] leading-[48px] md:text-[64px] md:leading-[72px] tracking-tight text-on-surface">Journal</h1>
            <p class="max-w-2xl font-manrope text-body-lg text-on-surface-variant">Catatan dari ruang-ruang tempat saya menunaikan hak: uang, kerja, langit, dan pasar. Satu orang, banyak ruang, satu sistem.</p>
        </section>
    @endif

    <section class="max-w-[1200px] mx-auto px-6 md:px-16 pb-8">
        <div class="flex gap-2 overflow-x-auto md:flex-wrap md:overflow-visible pb-1" role="group" aria-label="Saring menurut ruang">
            <a href="{{ url('/journal') }}" class="shrink-0 {{ $chipBase }} {{ $room ? $chipOff : $chipOn }}" @unless ($room) aria-current="true" @endunless>Semua <span class="font-medium opacity-65">{{ $totalPosts }}</span></a>
            @foreach ($roomCounts as $slug => $count)
                @php($active = $room && $room['slug'] === $slug)
                <a href="{{ url('/journal?ruang=' . $slug) }}" class="shrink-0 {{ $chipBase }} {{ $active ? $chipOn : $chipOff }}" @if ($active) aria-current="true" @endif>{{ str_replace('Ruang ', '', \App\Support\Rooms::find($slug)['name']) }} <span class="font-medium opacity-65">{{ $count }}</span></a>
            @endforeach
        </div>
    </section>

    <section class="max-w-[1200px] mx-auto px-6 md:px-16 pb-24">
        @forelse ($posts as $slug => $post)
            @include('partials.post-row', ['slug' => $slug, 'post' => $post])
        @empty
            <p class="py-9 border-t border-b border-surface-variant font-manrope text-body-md text-on-surface-variant">Belum ada tulisan di ruang ini.</p>
        @endforelse
    </section>

</x-layout>
