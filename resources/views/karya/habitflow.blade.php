<x-layout title="Habitflow" description="Habitflow: asisten harian pribadi yang menyatukan habit, jadwal, follow-up kerja, dan to-do bersama pasangan. Dibangun sendiri untuk Android dan web.">

    <article class="box">
        <h1 class="article-title">Habitflow</h1>

        <div class="article-body">
            <h2>&ldquo;Tahu sedang di blok apa sekarang, dan apa yang berikutnya.&rdquo;</h2>

            <ul class="tag-list">
                <li class="tag-status">{{ strtoupper($project['status_label']) }}</li>
                @foreach ($project['tech'] as $tech)
                    <li>{{ strtoupper($tech) }}</li>
                @endforeach
            </ul>

            <p>Habitflow adalah asisten harian pribadi yang saya bangun sendiri. Awalnya hanya pencatat habit dengan heatmap ala GitHub. Sekarang ia tumbuh menjadi satu tempat untuk jadwal sholat, alarm Subuh, follow-up kerja, kesehatan, dan to-do bersama pasangan, di Android dan di web.</p>

            <div class="image-row image-row-phone">
                <figure>
                    <img src="{{ asset('images/karya/habitflow-hari-ini.jpg') }}" alt="{{ $project['screens'][0]['alt'] }}" loading="lazy">
                    <figcaption>Hari ini</figcaption>
                </figure>
                <figure>
                    <img src="{{ asset('images/karya/habitflow-kontribusi.jpg') }}" alt="{{ $project['screens'][1]['alt'] }}" loading="lazy">
                    <figcaption>Kontribusi</figcaption>
                </figure>
                <figure>
                    <img src="{{ asset('images/karya/habitflow-habit.jpg') }}" alt="{{ $project['screens'][2]['alt'] }}" loading="lazy">
                    <figcaption>Kelola habit</figcaption>
                </figure>
            </div>
            <p><em>Tangkapan layar versi awal (5 Oktober 2026). Tampilan sekarang sudah jauh bertambah.</em></p>

            <h3>Masalah yang ingin saya selesaikan</h3>
            <p>Hidup saya terbagi ke banyak peran, dan tiap peran punya jadwal, target, dan hal yang harus ditindaklanjuti. Dulu semuanya tersebar: habit di satu aplikasi, task harian di Notion, alarm di jam, kalender di tempat lain. Yang saya butuhkan bukan satu fitur lagi, melainkan satu sistem yang menyatukan semuanya dan <strong>mengingatkan di waktu yang tepat, tanpa memarahi</strong>.</p>

            <h3>Apa yang bisa dilakukan</h3>
            <ul>
                <li><strong>Habit dan to-do harian</strong> dengan level hari (0&ndash;4), streak, dan heatmap kontribusi.</li>
                <li><strong>Jadwal harian dan waktu sholat</strong>, termasuk alarm Subuh dan pengingat adzan.</li>
                <li><strong>Follow-up kerja</strong>: catat dalam dua detik, lalu rapikan lewat daily scrum pagi dan EOD sore.</li>
                <li><strong>Pengingat air dan break</strong> di jam kerja, yang berhenti sendiri kalau diabaikan.</li>
                <li><strong>Kesehatan</strong>: langkah dari Health Connect, berat badan, dan tensi.</li>
                <li><strong>Kalender dan acara rutin.</strong></li>
                <li><strong>To-Do Tim</strong> untuk berbagi daftar tugas dengan pasangan.</li>
            </ul>

            <h3>Satu sistem, banyak ruang</h3>
            <p>Habitflow lahir dari gagasan yang sama dengan situs ini: setiap peran punya hak, dan setiap hak butuh sistemnya. Karena itu ia tidak menempel di satu ruang, melainkan melayani beberapa sekaligus.</p>
            <table>
                <thead>
                    <tr><th>Bagian Habitflow</th><th>Ruang yang dilayani</th></tr>
                </thead>
                <tbody>
                    <tr><td>Follow-up kerja, daily scrum, EOD, pengingat air dan break</td><td>Ruang Kerja</td></tr>
                    <tr><td>To-Do Tim bersama pasangan</td><td>Ruang Hati</td></tr>
                    <tr><td>Habit harian, jadwal sholat, kesehatan</td><td>Menjaga diri sendiri, di antara semua ruang</td></tr>
                </tbody>
            </table>

            <h3>Prinsip desain</h3>
            <ul>
                <li><strong>Tenang, bukan memarahi.</strong> Habit yang belum dicentang tampil abu-abu netral, bukan merah.</li>
                <li><strong>Sedikit notifikasi yang berarti</strong>, bukan banyak notifikasi yang diabaikan.</li>
                <li><strong>Offline dulu.</strong> Fitur inti jalan tanpa internet, dan HP adalah sumber datanya.</li>
                <li><strong>Habit tetap pusat.</strong> Langkah 8.000 mencentang &ldquo;Jalan kaki&rdquo;, delapan gelas mencentang &ldquo;Air putih&rdquo;.</li>
            </ul>

            <h3>Di balik layar</h3>
            <ul>
                <li><strong>Android</strong>: Kotlin, Jetpack Compose, dan Room. Data tersimpan lokal di HP.</li>
                <li><strong>Web dan API</strong>: Laravel 12 dengan Livewire, satu aplikasi yang melayani halaman web dan API untuk sinkronisasi.</li>
                <li><strong>Data</strong>: MySQL di server milik sendiri. Sinkron dilakukan saat ada internet, untuk backup dan pindah HP.</li>
                <li><strong>Hosting</strong>: container Docker di server rumah, diakses lewat Cloudflare Tunnel.</li>
            </ul>

            <h3>Status</h3>
            <p>Habitflow masih dikembangkan aktif. Versi web sudah bisa dibuka dengan akun Google, sedangkan aplikasi Android belum dirilis ke Play Store. Rencana berikutnya adalah asisten AI opsional untuk ringkasan mingguan dan membantu EOD. Data hanya dikirim saat fitur itu dipakai, dan AI tidak pernah mengubah data sendiri.</p>

            <p>
                <a class="cta-link" href="https://habitflow.roziqrizal.com/login" target="_blank" rel="noopener">BUKA HABITFLOW WEB &rarr;</a>
            </p>
        </div>
    </article>

</x-layout>
