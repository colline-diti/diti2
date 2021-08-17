<?php

namespace App\Http\Controllers\Api;

use App\Models\TaxRates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaxRatesResource;
use App\Http\Resources\TaxRatesCollection;
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
            ->paginate();

        return new TaxRatesCollection($allTaxRates);
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

        return new TaxRatesResource($taxRates);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxRates $taxRates
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TaxRates $taxRates)
    {
        $this->authorize('view', $taxRates);

        return new TaxRatesResource($taxRates);
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

        return new TaxRatesResource($taxRates);
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

        return response()->noContent();
    }
}
