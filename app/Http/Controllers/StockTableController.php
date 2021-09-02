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

    //Storing Damages
    public function storeDamages(Request $request){
        $salesid = "Item/".time();
        $item_id = $request->input('item_id');
        $damage_date = $request->input('damage_date');
        $quantity = $request->input('quantity');
        $remarks = $request->input('remarks');
        $id = $request->input('user_id');
       
        $data = array(
        "item_id" => $item_id,
        "damage_date" => $damage_date,
        "quantity" => $quantity,
        "remarks" => $remarks, 
        "user_id" => $id,      
        );
        DB::table('stock_damages')->insert($data);
        return redirect('/stock-discharges/stockDamages')->withSuccess(__('crud.common.created'));
        }

    public function insert(Request $request){
        $salesid = "Item/".time();
        $item_id = $request->input('item_id');
        $stock_id = $request->input('stock_id');
        $quantity_in= $request->input('quantity_in');

        $stock_date = $request->input('stock_date');
        $stock_reciept = $request->input('stock_reciept');
        
        $data = array(
        "item_id" => $item_id,
        "stock_id" => $stock_id,
        "quantity_in" => $quantity_in,

        "stock_date" => $stock_date,
        "stock_reciept" => $stock_reciept,


        );
        DB::table('available_stock')->insert($data);
        DB::table('stock_table')->where(['stock_date' => $stock_date, 'stock_reciept' => $stock_reciept ]);

        //$served_by = $request->input('served_by');
        //$stockentry = array(
           // "Number" => $total_recieved,
           // "Remarks" => $remarks,
           // "item_code" => $salesid,
           // "Date_rec" => $date,
          //  );
        //DB::table('stock_entry')->insert($stockentry); --->
        return redirect('stock-tables')->withSuccess(__('crud.common.created'));
        }


        //function discharge
        public function discharge(Request $request){
            $salesid = "Item/".time();
            $item_id = $request->input('item_id');
            $quantity_discharged = $request->input('quantity_discharged');
            $department_id = $request->input('department_id'); 
            $discharge_date = $request->input('discharge_date'); 
            $user_id = $request->input('user_id'); 
           
            $data = array(
            "item_id" => $item_id,
            "quantity_discharged" => $quantity_discharged,
            "department_id" => $department_id,
            "discharge_date" => $discharge_date,
            "user_id" => $user_id,
            );
            DB::table('stock_discharge3')->insert($data);
            //DB::table('available_stock')->where('Name',$item_name)->decrement('instock', $quantity_discharged);
            return redirect('stock-discharges')->withSuccess(__('crud.common.created'));
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
