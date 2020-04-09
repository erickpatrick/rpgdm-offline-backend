<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWeeklies;
use App\Weekly;

class WeekliesStore extends Controller
{
    public function __invoke(StoreWeeklies $request)
    {
        $weekly = Weekly::firstOrCreate($request->validated());

        return redirect()
            ->route('weeklies.create')
            ->with(
                'status',
                "Weekly <strong>#{$weekly->edition}</strong> created!"
            );
    }
}
