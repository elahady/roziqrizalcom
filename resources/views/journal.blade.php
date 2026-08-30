<x-layout title="Journal" description="elahady – Leading Tech Teams &amp; Observing Market Trends to Build Future">

    @foreach ($posts as $slug => $post)
        @include('partials.post-card', ['slug' => $slug, 'post' => $post])
    @endforeach

</x-layout>
