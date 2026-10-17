<article class="bento-card border-surface-variant hover:border-primary bg-surface hover:bg-surface-container-low col-span-12 sm:col-span-6 md:col-span-4 rounded-xl p-6 flex flex-col justify-between">
    <div class="flex justify-between items-start">
        <span class="material-symbols-outlined text-outline">show_chart</span>
        <span class="font-manrope text-label-caps text-tertiary">07 / Ruang Taktik</span>
    </div>
    <div class="mt-6 space-y-2">
        <span class="block font-manrope text-label-caps text-secondary uppercase tracking-wider">I am a Trader</span>
        <h4 class="font-serif-display text-xl text-on-surface">Ruang Taktik</h4>
        <p class="font-serif-display italic text-on-surface-variant">Pasar tidak peduli perasaan saya, jadi saya yang menyesuaikan.</p>
        <p class="font-manrope text-body-md text-on-surface-variant text-sm">Disiplin dan psikologi di balik setiap keputusan &mdash; emosi dipisahkan dari data, satu evaluasi pada satu waktu.</p>
        <ul class="flex flex-wrap gap-2 pt-1">
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Manajemen Risiko</li>
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Disiplin</li>
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Evaluasi</li>
        </ul>
        @include('partials.room-journal-link', ['room' => 'taktik'])
    </div>
</article>
