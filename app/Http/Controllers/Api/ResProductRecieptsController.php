<?php

namespace App\Http\Controllers\Api;

use App\Models\ResProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecieptResource;
use App\Http\Resources\RecieptCollection;

class ResProductRecieptsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ResProduct $resProduct)
    {
        $this->authorize('view', $resProduct);

        $search = $request->get('search', '');

        $reciepts = $resProduct
            ->reciepts()
            ->search($search)
            ->latest()
            ->paginate();

        return new RecieptCollection($reciepts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ResProduct $resProduct)
    {
        $this->authorize('create', Reciept::class);

        $validated = $request->validate([
            'quantity' => ['required', 'numeric'],
            'cash' => ['required', 'numeric'],
            'change' => ['required', 'numeric'],
            'balance' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'served_by' => ['required', 'max:255', 'string'],
        ]);

        $reciept = $resProduct->reciepts()->create($validated);

        return new RecieptResource($reciept);
    }
}
