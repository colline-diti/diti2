<?php

namespace App\Http\Controllers\Api;

use App\Models\TaxRates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoicesResource;
use App\Http\Resources\InvoicesCollection;

class TaxRatesAllInvoicesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxRates $taxRates
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TaxRates $taxRates)
    {
        $this->authorize('view', $taxRates);

        $search = $request->get('search', '');

        $allInvoices = $taxRates
            ->allInvoices()
            ->search($search)
            ->latest()
            ->paginate();

        return new InvoicesCollection($allInvoices);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxRates $taxRates
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TaxRates $taxRates)
    {
        $this->authorize('create', Invoices::class);

        $validated = $request->validate([
            'clients_id' => ['required', 'exists:clients,id'],
        ]);

        $invoices = $taxRates->allInvoices()->create($validated);

        return new InvoicesResource($invoices);
    }
}
