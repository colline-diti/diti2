<?php

namespace App\Http\Controllers;

use App\Models\StockTable;
use App\Models\ResSection;
use Illuminate\Http\Request;
use App\Models\StockDischarge;
use App\Http\Requests\StockDischargeStoreRequest;
use App\Http\Requests\StockDischargeUpdateRequest;

class StockDischargeController extends Controller
{
  //stock levels
    public function stockLevels(){
        return view('app.stock_discharges.stockLevels'); 
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', StockDischarge::class);

        $search = $request->get('search', '');

        $stockDischarges = StockDischarge::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.stock_discharges.index',
            compact('stockDischarges', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', StockDischarge::class);

        $stockTables = StockTable::pluck('item_name', 'id');
        $resSections = ResSection::pluck('section_name', 'id');

        return view(
            'app.stock_discharges.create',
            compact('stockTables', 'resSections')
        );
    }

    /**
     * @param \App\Http\Requests\StockDischargeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockDischargeStoreRequest $request)
    {
        $this->authorize('create', StockDischarge::class);

        $validated = $request->validated();

        $stockDischarge = StockDischarge::create($validated);

        return redirect()
            ->route('stock-discharges.index', $stockDischarge)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StockDischarge $stockDischarge)
    {
        $this->authorize('view', $stockDischarge);

        return view('app.stock_discharges.show', compact('stockDischarge'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StockDischarge $stockDischarge)
    {
        $this->authorize('update', $stockDischarge);

        $stockTables = StockTable::pluck('item_name', 'id');
        $resSections = ResSection::pluck('section_name', 'id');

        return view(
            'app.stock_discharges.edit',
            compact('stockDischarge', 'stockTables', 'resSections')
        );
    }

    /**
     * @param \App\Http\Requests\StockDischargeUpdateRequest $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function update(
        StockDischargeUpdateRequest $request,
        StockDischarge $stockDischarge
    ) {
        $this->authorize('update', $stockDischarge);

        $validated = $request->validated();

        $stockDischarge->update($validated);

        return redirect()
            ->route('stock-discharges.edit', $stockDischarge)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockDischarge $stockDischarge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StockDischarge $stockDischarge)
    {
        $this->authorize('delete', $stockDischarge);

        $stockDischarge->delete();

        return redirect()
            ->route('stock-discharges.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
