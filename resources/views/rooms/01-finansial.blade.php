<article class="bento-card border-surface-variant hover:border-primary bg-surface hover:bg-surface-container-low col-span-12 sm:col-span-6 md:col-span-4 rounded-xl p-6 flex flex-col justify-between">
    <div class="flex justify-between items-start">
        <span class="material-symbols-outlined text-outline">payments</span>
        <span class="font-manrope text-label-caps text-tertiary">01 / Ruang Finansial</span>
    </div>
    <div class="mt-6 space-y-2">
        <span class="block font-manrope text-label-caps text-secondary uppercase tracking-wider">I am an Investor</span>
        <h4 class="font-serif-display text-xl text-on-surface">Ruang Finansial</h4>
        <p class="font-serif-display italic text-on-surface-variant">Uang bekerja, saya yang menabung waktu.</p>
        <p class="font-manrope text-body-md text-on-surface-variant text-sm">Mengelola aset dan investasi sebagai pondasi hidup, dijaga lewat catatan harian, alokasi yang disengaja, dan disiplin arus kas.</p>
        <ul class="flex flex-wrap gap-2 pt-1">
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Alokasi Aset</li>
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Arus Kas Harian</li>
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Konsistensi</li>
        </ul>
        @include('partials.room-journal-link', ['room' => 'finansial'])
    </div>
</article>
