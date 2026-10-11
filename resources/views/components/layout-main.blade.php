@props(['title' => null, 'description' => null, 'active' => null])
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ? $title . ' – ' : '' }}Muhammad Roziq Rizal Al Ahadi</title>
    <meta name="description" content="{{ $description ?? 'Satu orang, sembilan ruang, satu sistem. Denah hidup Muhammad Roziq Rizal Al Ahadi.' }}">
    @include('partials.favicon')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-background text-on-background font-manrope antialiased">

@include('partials.site-header', ['active' => $active])

<main class="flex-1">
    {{ $slot }}
</main>

@include('partials.site-footer')

</body>
</html>
