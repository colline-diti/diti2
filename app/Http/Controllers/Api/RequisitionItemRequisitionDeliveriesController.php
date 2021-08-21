<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\RequisitionItem;
use App\Http\Controllers\Controller;
use App\Http\Resources\RequisitionDeliveryResource;
use App\Http\Resources\RequisitionDeliveryCollection;

class RequisitionItemRequisitionDeliveriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequisitionItem $requisitionItem
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, RequisitionItem $requisitionItem)
    {
        $this->authorize('view', $requisitionItem);

        $search = $request->get('search', '');

        $requisitionDeliveries = $requisitionItem
            ->requisitionDeliveries()
            ->search($search)
            ->latest()
            ->paginate();

        return new RequisitionDeliveryCollection($requisitionDeliveries);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RequisitionItem $requisitionItem
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RequisitionItem $requisitionItem)
    {
        $this->authorize('create', RequisitionDelivery::class);

        $validated = $request->validate([
            'item_quantity' => ['required', 'max:255', 'string'],
            'delivery_date' => ['required', 'date'],
            'remarks' => ['required', 'max:255', 'string'],
        ]);

        $requisitionDelivery = $requisitionItem
            ->requisitionDeliveries()
            ->create($validated);

        return new RequisitionDeliveryResource($requisitionDelivery);
    }
}
