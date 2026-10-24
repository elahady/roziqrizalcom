<?php

namespace App\Http\Controllers;

use App\Models\WaitlistSignup;
use App\Support\Projects;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WaitlistController extends Controller
{
    public function store(Request $request, string $project): RedirectResponse
    {
        abort_unless(array_key_exists($project, Projects::all()), 404);

        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $signup = WaitlistSignup::firstOrCreate([
            'project' => $project,
            'email' => $validated['email'],
        ]);

        return back()
            ->withFragment('daftar-tunggu')
            ->with('waitlist_status', $signup->wasRecentlyCreated ? 'baru' : 'sudah-terdaftar');
    }
}
