<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expeses_Resturant;
use App\Http\Requests\Expeses_ResturantStoreRequest;
use App\Http\Requests\Expeses_ResturantUpdateRequest;

class Expeses_ResturantController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Expeses_Resturant::class);

        $search = $request->get('search', '');

        $expesesResturants = Expeses_Resturant::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.expeses_resturants.index',
            compact('expesesResturants', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Expeses_Resturant::class);

        return view('app.expeses_resturants.create');
    }

    /**
     * @param \App\Http\Requests\Expeses_ResturantStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Expeses_ResturantStoreRequest $request)
    {
        $this->authorize('create', Expeses_Resturant::class);

        $validated = $request->validated();

        $expesesResturant = Expeses_Resturant::create($validated);

        return redirect()
            ->route('expeses-resturants.edit', $expesesResturant)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Expeses_Resturant $expesesResturant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Expeses_Resturant $expesesResturant)
    {
        $this->authorize('view', $expesesResturant);

        return view('app.expeses_resturants.show', compact('expesesResturant'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Expeses_Resturant $expesesResturant
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Expeses_Resturant $expesesResturant)
    {
        $this->authorize('update', $expesesResturant);

        return view('app.expeses_resturants.edit', compact('expesesResturant'));
    }

    /**
     * @param \App\Http\Requests\Expeses_ResturantUpdateRequest $request
     * @param \App\Models\Expeses_Resturant $expesesResturant
     * @return \Illuminate\Http\Response
     */
    public function update(
        Expeses_ResturantUpdateRequest $request,
        Expeses_Resturant $expesesResturant
    ) {
        $this->authorize('update', $expesesResturant);

        $validated = $request->validated();

        $expesesResturant->update($validated);

        return redirect()
            ->route('expeses-resturants.edit', $expesesResturant)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Expeses_Resturant $expesesResturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Expeses_Resturant $expesesResturant
    ) {
        $this->authorize('delete', $expesesResturant);

        $expesesResturant->delete();

        return redirect()
            ->route('expeses-resturants.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
