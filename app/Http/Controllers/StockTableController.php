<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\StockTable;
use Illuminate\Http\Request;
use App\Models\ItemCategory;
use App\Http\Requests\StockTableStoreRequest;
use App\Http\Requests\StockTableUpdateRequest;
use Illuminate\Support\Facades\DB;

class StockTableController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', StockTable::class);

        $search = $request->get('search', '');

        $stockTables = StockTable::search($search)
            ->latest()
            ->paginate(5);

        return view('app.stock_tables.index', compact('stockTables', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', StockTable::class);

        $itemCategories = ItemCategory::pluck('name', 'id');
        $units = Unit::pluck('unit_name', 'id');

        return view(
            'app.stock_tables.create',
            compact('itemCategories', 'units')
        );
    }
    public function addStock(){
        return view('app.stock_tables.addStock');
    }

    public function insert(Request $request){
        $salesid = "Item/".time();
        $item_id = $request->input('item_id');
        $dameges = $request->input('dameges');
        $total_recieved = $request->input('total_recieved');
        $item_units = $request->input('item_units');
        $store_section = $request->input('store_section');
        $receved_by = $request->input('receved_by'); 
        $date = $request->input('date'); 
        $remarks = $request->input('remarks'); 
       // $served_by = $request->input('served_by');
        $data = array(
        "item_id" => $item_id,
        "instock" => $total_recieved - $dameges,
        "units" => $item_units,
        "section" => $store_section,
        "Received_by" => $receved_by,
        "Date_rec" => $date,
        );
        DB::table('available_stock')->insert($data);

        // $served_by = $request->input('served_by');
        $stockentry = array(
            "Number" => $total_recieved,
            "Remarks" => $remarks,
            "item_code" => $salesid,
            "Date_rec" => $date,
            );
        DB::table('stock_entry')->insert($stockentry);
        return redirect('stock-tables')->withSuccess(__('crud.common.created'));
        }


        //function discharge
        public function discharge(Request $request){
            $salesid = "Item/".time();
            $item_name = $request->input('item_name');
            $quantity_discharged = $request->input('quantity_discharged');
            $receved_by = $request->input('receved_by'); 
            $date = $request->input('date'); 
           // $served_by = $request->input('served_by');
            $data = array(
            "Item_name" => $item_name,
            "quantity_discharged" => $quantity_discharged,
            "discharged_by" => $receved_by,
            "date_recorded" => $date,
            );
            DB::table('stock_discharge3')->insert($data);
            DB::table('available_stock')->where('Name',$item_name)->decrement('instock', $quantity_discharged);
            return redirect('stock-tables')->withSuccess(__('crud.common.created'));
            }
    /**
     * @param \App\Http\Requests\StockTableStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockTableStoreRequest $request)
    {
        $this->authorize('create', StockTable::class);

        $validated = $request->validated();

        $stockTable = StockTable::create($validated);

        return redirect()
            ->route('stock-tables.index', $stockTable)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StockTable $stockTable)
    {
        $this->authorize('view', $stockTable);

        return view('app.stock_tables.show', compact('stockTable'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StockTable $stockTable)
    {
        $this->authorize('update', $stockTable);

        $itemCategories = ItemCategory::pluck('name', 'id');
        $units = Unit::pluck('unit_name', 'id');

        return view(
            'app.stock_tables.edit',
            compact('stockTable', 'itemCategories', 'units')
        );
    }

    //editing stock item
    public function editStockItem($id)
    {
        $this->authorize('update', 'available_stock');

        if(request()->ajax())
        {
            $data =  DB::table('available_stock')->select('item_id','Name','Category','instock','units','section','Date_rec','Received_by')->where('item_id',$id);
            //->get();DB::table('available_stock')->where('id',$id);
            //Sample_data::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * @param \App\Http\Requests\StockTableUpdateRequest $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function update(
        StockTableUpdateRequest $request,
        StockTable $stockTable
    ) {
        $this->authorize('update', $stockTable);

        $validated = $request->validated();

        $stockTable->update($validated);

        return redirect()
            ->route('stock-tables.edit', $stockTable)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StockTable $stockTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StockTable $stockTable)
    {
        $this->authorize('delete', $stockTable);

        $stockTable->delete();

        return redirect()
            ->route('stock-tables.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
