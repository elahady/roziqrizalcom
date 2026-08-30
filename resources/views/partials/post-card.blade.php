<article class="box post-card">
    <h2><a href="{{ url('/' . $slug) }}">{{ $post['title'] }}</a></h2>
    <div class="meta-divider"><span class="line"></span><span>Posted on {{ $post['date'] }}</span><span class="line"></span></div>
    <p class="excerpt">{{ $post['excerpt'] }}</p>
    <a class="read-more" href="{{ url('/' . $slug) }}">Read more</a>
</article>
