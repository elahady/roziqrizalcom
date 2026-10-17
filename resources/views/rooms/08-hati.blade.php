<article class="bento-card border-surface-variant hover:border-primary bg-surface hover:bg-surface-container-low col-span-12 rounded-xl p-8 md:p-10 flex flex-col md:flex-row md:items-center gap-8 justify-between">
    <div class="flex items-start gap-4 md:max-w-xl">
        <span class="inline-flex p-3 bg-sage-pastel/40 rounded-lg text-primary shrink-0">
            <span class="material-symbols-outlined text-3xl">favorite</span>
        </span>
        <div class="space-y-2">
            <div class="flex items-center gap-3">
                <span class="font-manrope text-label-caps text-secondary uppercase tracking-wider">I am a Husband</span>
                <span class="font-manrope text-label-caps text-tertiary">08 / Ruang Hati</span>
            </div>
            <h4 class="font-serif-display text-headline-md text-on-surface">Ruang Hati</h4>
            <p class="font-serif-display italic text-lg text-on-surface-variant">Prioritas, bukan sisa waktu.</p>
            <p class="font-manrope text-body-md text-on-surface-variant">Rumah tangga diberi tempat dan waktu yang sama sengajanya dengan ruang-ruang lain &mdash; karena inilah yang membuat semua ruang lain masuk akal.</p>
            @include('partials.room-journal-link', ['room' => 'hati'])
        </div>
    </div>
    <ul class="flex flex-wrap gap-2 md:shrink-0">
        <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Kehadiran</li>
        <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Komitmen</li>
        <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Waktu</li>
    </ul>
</article>
