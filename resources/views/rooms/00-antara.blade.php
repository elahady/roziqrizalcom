<article class="bento-card border-primary col-span-12 md:col-span-4 rounded-xl p-8 md:p-10 flex flex-col justify-between bg-primary text-on-primary">
    <div class="flex items-center justify-between">
        <span class="inline-flex p-3 bg-white/15 rounded-lg text-on-primary">
            <span class="material-symbols-outlined text-3xl">spa</span>
        </span>
        <span class="font-manrope text-label-caps text-primary-fixed">00 / Ruang Antara</span>
    </div>
    <div class="mt-8 space-y-3">
        <span class="inline-block font-manrope text-label-caps text-primary-fixed">bukan peran &mdash; tapi ruang di antaranya</span>
        <h3 class="font-serif-display text-headline-md text-on-primary">Ruang Antara</h3>
        <p class="font-serif-display italic text-lg text-primary-fixed">Ada jeda di antara stimulus dan respons &mdash; dan di situlah saya sebenarnya tinggal.</p>
        <p class="font-manrope text-body-md text-primary-fixed">Bukan sebuah kamar seperti delapan lainnya. Ia adalah lorong tempat kedelapan ruang itu bertemu &mdash; tempat ketenangan dipilih, bukan kebetulan; tempat reaksi diubah menjadi keputusan.</p>
        @include('partials.room-journal-link', ['room' => 'antara', 'dark' => true])
    </div>
</article>
