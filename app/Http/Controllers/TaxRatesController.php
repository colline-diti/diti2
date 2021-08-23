<?php

namespace App\Http\Controllers;

use App\Models\TaxRates;
use Illuminate\Http\Request;
use App\Http\Requests\TaxRatesStoreRequest;
use App\Http\Requests\TaxRatesUpdateRequest;

class TaxRatesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TaxRates::class);

        $search = $request->get('search', '');

        $allTaxRates = TaxRates::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.all_tax_rates.index',
            compact('allTaxRates', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TaxRates::class);

        return view('app.all_tax_rates.create');
    }

    /**
     * @param \App\Http\Requests\TaxRatesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxRatesStoreRequest $request)
    {
        $this->authorize('create', TaxRates::class);

        $validated = $request->validated();

        $taxRates = TaxRates::create($validated);

        return redirect()
            ->route('all-tax-rates.edit', $taxRates)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxRates $taxRates
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TaxRates $taxRates)
    {
        $this->authorize('view', $taxRates);

        return view('app.all_tax_rates.show', compact('taxRates'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxRates $taxRates
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TaxRates $taxRates)
    {
        $this->authorize('update', $taxRates);

        return view('app.all_tax_rates.edit', compact('taxRates'));
    }

    /**
     * @param \App\Http\Requests\TaxRatesUpdateRequest $request
     * @param \App\Models\TaxRates $taxRates
     * @return \Illuminate\Http\Response
     */
    public function update(TaxRatesUpdateRequest $request, TaxRates $taxRates)
    {
        $this->authorize('update', $taxRates);

        $validated = $request->validated();

        $taxRates->update($validated);

        return redirect()
            ->route('all-tax-rates.edit', $taxRates)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxRates $taxRates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TaxRates $taxRates)
    {
        $this->authorize('delete', $taxRates);

        $taxRates->delete();

        return redirect()
            ->route('all-tax-rates.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
