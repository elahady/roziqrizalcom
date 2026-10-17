<article class="bento-card border-surface-variant hover:border-primary bg-surface hover:bg-surface-container-low col-span-12 sm:col-span-6 md:col-span-4 rounded-xl p-6 flex flex-col justify-between">
    <div class="flex justify-between items-start">
        <span class="material-symbols-outlined text-outline">menu_book</span>
        <span class="font-manrope text-label-caps text-tertiary">05 / Ruang Perpustakaan</span>
    </div>
    <div class="mt-6 space-y-2">
        <span class="block font-manrope text-label-caps text-secondary uppercase tracking-wider">I am a Reader</span>
        <h4 class="font-serif-display text-xl text-on-surface">Ruang Perpustakaan</h4>
        <p class="font-serif-display italic text-on-surface-variant">Bahan bakar untuk semua ruang lainnya.</p>
        <p class="font-manrope text-body-md text-on-surface-variant text-sm">Kumpulan bacaan dan catatan yang terus bertambah &mdash; setiap ruang lain ditopang oleh apa yang dipelajari di sini.</p>
        <ul class="flex flex-wrap gap-2 pt-1">
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Bacaan</li>
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Catatan</li>
            <li class="font-manrope text-label-caps text-secondary border border-outline-variant rounded px-3 py-1">Refleksi</li>
        </ul>
        @include('partials.room-journal-link', ['room' => 'perpustakaan'])
    </div>
</article>
