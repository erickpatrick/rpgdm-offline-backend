<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinks;
use App\Link;
use Illuminate\Http\RedirectResponse;

class LinksStore extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\StoreLinks $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(StoreLinks $request): RedirectResponse
    {
        $link = Link::firstOrCreate($request->validated());

        $editLinkRoute = route('links.edit', ['link' => $link]);

        return redirect()
            ->route('links.create')
            ->with('status', "Link <a href='{$editLinkRoute}'>{$link->name}</a> created!");
    }
}
