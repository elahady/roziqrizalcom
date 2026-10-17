<footer class="bg-surface-container border-t border-secondary/10 py-16 md:py-24 w-full">
    <div class="max-w-[1200px] mx-auto px-6 md:px-16 flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="font-serif-display text-headline-lg-mobile md:text-headline-md text-on-surface font-bold text-center md:text-left">
            Muhammad Roziq Rizal Al Ahadi
        </div>
        <div class="flex flex-wrap justify-center gap-8">
            <a class="font-manrope text-label-caps text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/#karya') }}">Karya</a>
            <a class="font-manrope text-label-caps text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/journal') }}">Journal</a>
            <a class="font-manrope text-label-caps text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/about-me') }}">Profil</a>
            <a class="font-manrope text-label-caps text-on-surface-variant hover:text-primary transition-colors duration-200" href="https://www.linkedin.com/in/roziq-rizal/" target="_blank" rel="noopener">LinkedIn</a>
        </div>
        <div class="font-manrope text-body-md text-secondary text-center md:text-right">
            &copy; {{ date('Y') }} Muhammad Roziq Rizal Al Ahadi. Lead. Build. Serve. Observe.
        </div>
    </div>
</footer>
