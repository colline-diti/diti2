<?php

namespace App\Http\Controllers\Api;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoicesResource;
use App\Http\Resources\InvoicesCollection;

class ClientsAllInvoicesController extends Controller
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

        $allInvoices = $clients
            ->allInvoices()
            ->search($search)
            ->latest()
            ->paginate();

        return new InvoicesCollection($allInvoices);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clients $clients
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Clients $clients)
    {
        $this->authorize('create', Invoices::class);

        $validated = $request->validate([
            'tax_rates_id' => ['required', 'exists:tax_rates,id'],
        ]);

        $invoices = $clients->allInvoices()->create($validated);

        return new InvoicesResource($invoices);
    }
}
