@foreach ($posts as $slug => $post)
    @include('partials.post-card', ['slug' => $slug, 'post' => $post])
@endforeach
