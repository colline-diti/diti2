<?php

namespace App\Http\Controllers\Api;

use App\Models\Invoices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoicesResource;
use App\Http\Resources\InvoicesCollection;
use App\Http\Requests\InvoicesStoreRequest;
use App\Http\Requests\InvoicesUpdateRequest;

class InvoicesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Invoices::class);

        $search = $request->get('search', '');

        $allInvoices = Invoices::search($search)
            ->latest()
            ->paginate();

        return new InvoicesCollection($allInvoices);
    }

    /**
     * @param \App\Http\Requests\InvoicesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoicesStoreRequest $request)
    {
        $this->authorize('create', Invoices::class);

        $validated = $request->validated();

        $invoices = Invoices::create($validated);

        return new InvoicesResource($invoices);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Invoices $invoices)
    {
        $this->authorize('view', $invoices);

        return new InvoicesResource($invoices);
    }

    /**
     * @param \App\Http\Requests\InvoicesUpdateRequest $request
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(InvoicesUpdateRequest $request, Invoices $invoices)
    {
        $this->authorize('update', $invoices);

        $validated = $request->validated();

        $invoices->update($validated);

        return new InvoicesResource($invoices);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Invoices $invoices)
    {
        $this->authorize('delete', $invoices);

        $invoices->delete();

        return response()->noContent();
    }
}
