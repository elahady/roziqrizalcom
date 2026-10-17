<?php

namespace App\Http\Controllers;

use App\Support\Posts;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function show(string $slug): View
    {
        $post = Posts::find($slug);

        abort_unless($post, 404);

        return view($post['view'], ['slug' => $slug, 'post' => $post]);
    }
}
