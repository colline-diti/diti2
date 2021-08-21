<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RestaurantRequisition;
use App\Http\Resources\RequisitionItemResource;
use App\Http\Resources\RequisitionItemCollection;

class RestaurantRequisitionRequisitionItemsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RestaurantRequisition $restaurantRequisition
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        RestaurantRequisition $restaurantRequisition
    ) {
        $this->authorize('view', $restaurantRequisition);

        $search = $request->get('search', '');

        $requisitionItems = $restaurantRequisition
            ->requisitionItems()
            ->search($search)
            ->latest()
            ->paginate();

        return new RequisitionItemCollection($requisitionItems);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RestaurantRequisition $restaurantRequisition
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        RestaurantRequisition $restaurantRequisition
    ) {
        $this->authorize('create', RequisitionItem::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
        ]);

        $requisitionItem = $restaurantRequisition
            ->requisitionItems()
            ->create($validated);

        return new RequisitionItemResource($requisitionItem);
    }
}
