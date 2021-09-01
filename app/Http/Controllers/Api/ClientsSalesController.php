<?php

namespace App\Http\Controllers\Api;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Resources\SaleResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\SaleCollection;

class ClientsSalesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clients $clients
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Clients $clients)
    {
        $this->authorize('view', $clients);

        $search = $request->get('search', '');

        $sales = $clients
            ->sales()
            ->search($search)
            ->latest()
            ->paginate();

        return new SaleCollection($sales);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clients $clients
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Clients $clients)
    {
        $this->authorize('create', Sale::class);

        $validated = $request->validate([
            'product_name' => ['required', 'max:255', 'string'],
            'unit_price' => ['required', 'numeric'],
            'total_price' => ['required', 'numeric'],
            'discounts' => ['required', 'numeric'],
            'payment_types_id' => ['required', 'exists:payment_types,id'],
        ]);

        $sale = $clients->sales()->create($validated);

        return new SaleResource($sale);
    }
}
