<article class="bento-card border-surface-variant hover:border-primary col-span-12 md:col-span-8 rounded-xl p-8 md:p-10 flex flex-col justify-between soft-gradient">
    <div class="flex items-center justify-between">
        <span class="inline-flex p-3 bg-white/70 rounded-lg text-primary">
            <span class="material-symbols-outlined text-3xl">groups</span>
        </span>
        <span class="font-manrope text-label-caps text-tertiary">02 / Ruang Kerja</span>
    </div>
    <div class="mt-8 space-y-3 max-w-xl">
        <span class="inline-block font-manrope text-label-caps text-on-primary-container">I am a Leader</span>
        <h3 class="font-serif-display text-headline-md text-on-surface">Ruang Kerja</h3>
        <p class="font-serif-display italic text-lg text-on-surface-variant">Memimpin proyek, bukan sekadar menyelesaikan tugas.</p>
        <p class="font-manrope text-body-md text-on-surface-variant">Tempat tim, proyek, dan keputusan bertemu &mdash; di sinilah kepemimpinan diuji bukan lewat visi besar, tapi lewat cara menangani hal kecil setiap hari.</p>
        <ul class="flex flex-wrap gap-2 pt-2">
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Delegasi</li>
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Prioritas</li>
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Akuntabilitas</li>
        </ul>
        @include('partials.room-journal-link', ['room' => 'kerja'])
    </div>
</article>
