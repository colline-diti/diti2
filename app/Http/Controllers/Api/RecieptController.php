<?php

namespace App\Http\Controllers\Api;

use App\Models\Reciept;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecieptResource;
use App\Http\Resources\RecieptCollection;
use App\Http\Requests\RecieptStoreRequest;
use App\Http\Requests\RecieptUpdateRequest;

class RecieptController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Reciept::class);

        $search = $request->get('search', '');

        $reciepts = Reciept::search($search)
            ->latest()
            ->paginate();

        return new RecieptCollection($reciepts);
    }

    /**
     * @param \App\Http\Requests\RecieptStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecieptStoreRequest $request)
    {
        $this->authorize('create', Reciept::class);

        $validated = $request->validated();

        $reciept = Reciept::create($validated);

        return new RecieptResource($reciept);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reciept $reciept
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Reciept $reciept)
    {
        $this->authorize('view', $reciept);

        return new RecieptResource($reciept);
    }

    /**
     * @param \App\Http\Requests\RecieptUpdateRequest $request
     * @param \App\Models\Reciept $reciept
     * @return \Illuminate\Http\Response
     */
    public function update(RecieptUpdateRequest $request, Reciept $reciept)
    {
        $this->authorize('update', $reciept);

        $validated = $request->validated();

        $reciept->update($validated);

        return new RecieptResource($reciept);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reciept $reciept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reciept $reciept)
    {
        $this->authorize('delete', $reciept);

        $reciept->delete();

        return response()->noContent();
    }
}
