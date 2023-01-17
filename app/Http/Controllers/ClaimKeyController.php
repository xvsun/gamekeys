<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Support\Concerns\InteractsWithBanner;
use Illuminate\Http\Request;

class ClaimKeyController extends Controller
{
    use InteractsWithBanner;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Key $key)
    {
        if (! $key->canBeClaimed()) {
            return;
        }

        $key->claim();
        $this->banner('Key successfully claimed.');
    }
}
