<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Expeses_Resturant;
use App\Http\Controllers\Controller;
use App\Http\Resources\Expeses_ResturantResource;
use App\Http\Resources\Expeses_ResturantCollection;
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
            ->paginate();

        return new Expeses_ResturantCollection($expesesResturants);
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

        return new Expeses_ResturantResource($expesesResturant);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Expeses_Resturant $expesesResturant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Expeses_Resturant $expesesResturant)
    {
        $this->authorize('view', $expesesResturant);

        return new Expeses_ResturantResource($expesesResturant);
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

        return new Expeses_ResturantResource($expesesResturant);
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

        return response()->noContent();
    }
}
