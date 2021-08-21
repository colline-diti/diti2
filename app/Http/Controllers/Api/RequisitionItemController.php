<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\RequisitionItem;
use App\Http\Controllers\Controller;
use App\Http\Resources\RequisitionItemResource;
use App\Http\Resources\RequisitionItemCollection;
use App\Http\Requests\RequisitionItemStoreRequest;
use App\Http\Requests\RequisitionItemUpdateRequest;

class RequisitionItemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', RequisitionItem::class);

        $search = $request->get('search', '');

        $requisitionItems = RequisitionItem::search($search)
            ->latest()
            ->paginate();

        return new RequisitionItemCollection($requisitionItems);
    }

    /**
     * @param \App\Http\Requests\RequisitionItemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequisitionItemStoreRequest $request)
    {
        $this->authorize('create', RequisitionItem::class);

        $validated = $request->validated();

        $requisitionItem = RequisitionItem::create($validated);

        return new RequisitionItemResource($requisitionItem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequisitionItem $requisitionItem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RequisitionItem $requisitionItem)
    {
        $this->authorize('view', $requisitionItem);

        return new RequisitionItemResource($requisitionItem);
    }

    /**
     * @param \App\Http\Requests\RequisitionItemUpdateRequest $request
     * @param \App\Models\RequisitionItem $requisitionItem
     * @return \Illuminate\Http\Response
     */
    public function update(
        RequisitionItemUpdateRequest $request,
        RequisitionItem $requisitionItem
    ) {
        $this->authorize('update', $requisitionItem);

        $validated = $request->validated();

        $requisitionItem->update($validated);

        return new RequisitionItemResource($requisitionItem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequisitionItem $requisitionItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RequisitionItem $requisitionItem)
    {
        $this->authorize('delete', $requisitionItem);

        $requisitionItem->delete();

        return response()->noContent();
    }
}
