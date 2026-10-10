@props(['title' => null, 'description' => null])
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'elahady' }} &ndash; elahady</title>
    <meta name="description" content="{{ $description ?? 'Leading Tech Teams & Observing Market Trends to Build Future' }}">
    @include('partials.favicon')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header class="site-header">
        <h1 class="site-title"><a href="{{ url('/') }}">Muhammad Roziq Rizal Al Ahadi</a></h1>
        <p class="site-tagline">Leading at Work. Building in Code. Serving in Faith. Observe to build</p>
    </header>
    <hr class="header-divider">

    @include('partials.nav')

    <main class="site-wrap content-grid">
        <div>
            {{ $slot }}
        </div>
        @include('partials.sidebar')
    </main>

    <footer class="site-footer">
        @include('partials.social-links')
        <p>&copy; {{ date('Y') }} elahady. All rights reserved.</p>
    </footer>

</body>
</html>
