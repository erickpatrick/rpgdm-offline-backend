<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWeeklies;
use App\Weekly;

class WeekliesUpdate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\UpdateWeeklies $request
     * @param \App\Weekly $weekly
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateWeeklies $request, Weekly $weekly)
    {
        Weekly::whereId($weekly->id)
            ->update($request->validated());

        return redirect()
            ->route('weeklies.edit', ['weekly' => $weekly->id])
            ->with('status', "Weekly <strong>#{$weekly->edition}</strong> updated!");
    }
}
