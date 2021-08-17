<?php

namespace App\Http\Controllers\Api;

use App\Models\PettyCash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PettyCashResource;
use App\Http\Resources\PettyCashCollection;
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
            ->paginate();

        return new PettyCashCollection($pettyCashes);
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

        return new PettyCashResource($pettyCash);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PettyCash $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PettyCash $pettyCash)
    {
        $this->authorize('view', $pettyCash);

        return new PettyCashResource($pettyCash);
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

        return new PettyCashResource($pettyCash);
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

        return response()->noContent();
    }
}
