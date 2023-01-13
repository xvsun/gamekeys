<?php

namespace App\Http\Controllers;

use App\Models\Key;
use Illuminate\Http\Request;

class ClaimKeyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Key $key)
    {
        if ($key->canBeClaimed()) {
            $key->claim();
        }
    }
}
