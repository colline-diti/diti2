<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Invoices;
use App\Models\TaxRates;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.all_invoices.index', compact('allInvoices', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Invoices::class);

        $allClients = Clients::pluck('name', 'id');
        $allTaxRates = TaxRates::pluck('tax_name', 'id');

        return view(
            'app.all_invoices.create',
            compact('allClients', 'allTaxRates')
        );
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

        return redirect()
            ->route('all-invoices.edit', $invoices)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Invoices $invoices)
    {
        $this->authorize('view', $invoices);

        return view('app.all_invoices.show', compact('invoices'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Invoices $invoices)
    {
        $this->authorize('update', $invoices);

        $allClients = Clients::pluck('name', 'id');
        $allTaxRates = TaxRates::pluck('tax_name', 'id');

        return view(
            'app.all_invoices.edit',
            compact('invoices', 'allClients', 'allTaxRates')
        );
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

        return redirect()
            ->route('all-invoices.edit', $invoices)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('all-invoices.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
