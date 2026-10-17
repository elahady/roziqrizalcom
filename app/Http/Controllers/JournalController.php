<?php

namespace App\Http\Controllers;

use App\Support\Posts;
use App\Support\Rooms;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Daftar semua tulisan, atau tulisan satu ruang lewat /journal?ruang=<slug>.
     */
    public function index(Request $request): View
    {
        $room = null;

        if ($request->has('ruang')) {
            $slug = $request->query('ruang');
            $room = is_string($slug) ? Rooms::find($slug) : null;

            abort_unless($room, 404);
        }

        $posts = Posts::sorted($room['slug'] ?? null);

        $seriesKey = collect($posts)->pluck('series')->filter()->first();

        return view('journal', [
            'room' => $room,
            'posts' => $posts,
            'roomCounts' => Posts::roomCounts(),
            'totalPosts' => count(Posts::all()),
            'series' => $seriesKey ? Posts::SERIES[$seriesKey] + ['count' => count(array_filter($posts, fn (array $post) => ($post['series'] ?? null) === $seriesKey))] : null,
        ]);
    }
}
