<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequisitionItem;
use App\Models\RestaurantRequisition;
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
            ->paginate(5);

        return view(
            'app.requisition_items.index',
            compact('requisitionItems', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', RequisitionItem::class);

        $restaurantRequisitions = RestaurantRequisition::pluck('requisition_code', 'id');

        return view(
            'app.requisition_items.create',
            compact('restaurantRequisitions')
        );
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

        return redirect()
            ->route('requisition-items.index', $requisitionItem)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequisitionItem $requisitionItem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RequisitionItem $requisitionItem)
    {
        $this->authorize('view', $requisitionItem);

        return view('app.requisition_items.show', compact('requisitionItem'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequisitionItem $requisitionItem
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RequisitionItem $requisitionItem)
    {
        $this->authorize('update', $requisitionItem);

        $restaurantRequisitions = RestaurantRequisition::pluck('requisition_code', 'id');

        return view(
            'app.requisition_items.edit',
            compact('requisitionItem', 'restaurantRequisitions')
        );
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

        return redirect()
            ->route('requisition-items.edit', $requisitionItem)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('requisition-items.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
