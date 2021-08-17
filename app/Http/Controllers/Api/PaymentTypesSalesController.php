<?php

namespace App\Http\Controllers\Api;

use App\Models\PaymentTypes;
use Illuminate\Http\Request;
use App\Http\Resources\SaleResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\SaleCollection;

class PaymentTypesSalesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentTypes $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PaymentTypes $paymentTypes)
    {
        $this->authorize('view', $paymentTypes);

        $search = $request->get('search', '');

        $sales = $paymentTypes
            ->sales()
            ->search($search)
            ->latest()
            ->paginate();

        return new SaleCollection($sales);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentTypes $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PaymentTypes $paymentTypes)
    {
        $this->authorize('create', Sale::class);

        $validated = $request->validate([
            'product_name' => ['required', 'max:255', 'string'],
            'unit_price' => ['required', 'numeric'],
            'total_price' => ['required', 'numeric'],
            'discounts' => ['required', 'numeric'],
            'clients_id' => ['required', 'exists:clients,id'],
        ]);

        $sale = $paymentTypes->sales()->create($validated);

        return new SaleResource($sale);
    }
}
