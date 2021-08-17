<?php

namespace App\Http\Controllers;

use App\Models\PettyCash;
use Illuminate\Http\Request;
use App\Models\Expeses_Resturant;
use App\Http\Requests\PettyCashStoreRequest;
use App\Http\Requests\PettyCashUpdateRequest;

class PettyCashController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PettyCash::class);

        $search = $request->get('search', '');

        $pettyCashes = PettyCash::search($search)
            ->latest()
            ->paginate(5);

        return view('app.petty_cashes.index', compact('pettyCashes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', PettyCash::class);

        $expesesResturants = Expeses_Resturant::pluck('particulars', 'id');

        return view('app.petty_cashes.create', compact('expesesResturants'));
    }

    /**
     * @param \App\Http\Requests\PettyCashStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PettyCashStoreRequest $request)
    {
        $this->authorize('create', PettyCash::class);

        $validated = $request->validated();

        $pettyCash = PettyCash::create($validated);

        return redirect()
            ->route('petty-cashes.edit', $pettyCash)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PettyCash $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PettyCash $pettyCash)
    {
        $this->authorize('view', $pettyCash);

        return view('app.petty_cashes.show', compact('pettyCash'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PettyCash $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PettyCash $pettyCash)
    {
        $this->authorize('update', $pettyCash);

        $expesesResturants = Expeses_Resturant::pluck('particulars', 'id');

        return view(
            'app.petty_cashes.edit',
            compact('pettyCash', 'expesesResturants')
        );
    }

    /**
     * @param \App\Http\Requests\PettyCashUpdateRequest $request
     * @param \App\Models\PettyCash $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function update(
        PettyCashUpdateRequest $request,
        PettyCash $pettyCash
    ) {
        $this->authorize('update', $pettyCash);

        $validated = $request->validated();

        $pettyCash->update($validated);

        return redirect()
            ->route('petty-cashes.edit', $pettyCash)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PettyCash $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PettyCash $pettyCash)
    {
        $this->authorize('delete', $pettyCash);

        $pettyCash->delete();

        return redirect()
            ->route('petty-cashes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
