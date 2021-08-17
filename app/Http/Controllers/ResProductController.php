<?php

namespace App\Http\Controllers;

use App\Models\ResProduct;
use App\Models\ResCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ResProductStoreRequest;
use App\Http\Requests\ResProductUpdateRequest;
use Illuminate\Support\Facades\Input;
use DB;

class ResProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

//point of sale function

    public function pointOfsale(){
    //Product::create($request->all());

   // DB::table('receits')->insert([
    //'Productname' => input('title'),
    //'Quantity' => input('quantity'),
    //'price' => input('unitprice'),
    //'amount' => input('total'),
    //'cash' => input('cash'),
    //'by' => input('served_by'),
    // ]);
        return view('app.res_products.pointOfsale');
        
    }    

    public function dailyLogs(){
        return view('app.res_products.dailyLogs');
    }
    
    public function index(Request $request)
    {
        $this->authorize('view-any', ResProduct::class);

        $search = $request->get('search', '');

        $resProducts = ResProduct::search($search)
            ->latest()
            ->paginate(5);

        return view('app.res_products.index', compact('resProducts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ResProduct::class);

        $resCategories = ResCategory::pluck('name', 'id');

        return view('app.res_products.create', compact('resCategories'));
    }

    /**
     * @param \App\Http\Requests\ResProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResProductStoreRequest $request)
    {
        $this->authorize('create', ResProduct::class);

        $validated = $request->validated();

        $resProduct = ResProduct::create($validated);

        return redirect()
            ->route('res-products.index', $resProduct)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ResProduct $resProduct)
    {
        $this->authorize('view', $resProduct);

        return view('app.res_products.show', compact('resProduct'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ResProduct $resProduct)
    {
        $this->authorize('update', $resProduct);

        $resCategories = ResCategory::pluck('name', 'id');

        return view(
            'app.res_products.edit',
            compact('resProduct', 'resCategories')
        );
    }

    /**
     * @param \App\Http\Requests\ResProductUpdateRequest $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function update(
        ResProductUpdateRequest $request,
        ResProduct $resProduct
    ) {
        $this->authorize('update', $resProduct);

        $validated = $request->validated();

        $resProduct->update($validated);

        return redirect()
            ->route('res-products.edit', $resProduct)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ResProduct $resProduct)
    {
        $this->authorize('delete', $resProduct);

        $resProduct->delete();

        return redirect()
            ->route('res-products.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
