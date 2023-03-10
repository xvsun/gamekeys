<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $keys = Auth::user()->keys()->with(['game:id,name', 'platform:id,name'])->get();

        return Inertia::render('Library', [
            'keys' => $keys,
            #dd(keys)
        ]);
    }
}
