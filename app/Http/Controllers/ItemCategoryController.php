<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ItemCategoryStoreRequest;
use App\Http\Requests\ItemCategoryUpdateRequest;
use Illuminate\Support\Facades\DB;

class ItemCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ItemCategory::class);

        $search = $request->get('search', '');

        $itemCategories = ItemCategory::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.item_categories.index',
            compact('itemCategories', 'search')
        );
    }

    public function categories(){
        return view('app.item_categories.categories');
    }
    public function units(){
        return view('app.item_categories.units');
    }
    public function departments(){
        return view('app.item_categories.departments');
    }

    //inserting new category
    public function insert(Request $request){
        $salesid = "/".time();
        $item_name = $request->input('item_name');
        $category_id = $request->input('category_id');
       // $served_by = $requesItemt->input('served_by');
        $data = array(
        "item_name" => $item_name,
        "category_id" => $category_id,
        );
        DB::table('items')->insert($data);
        return redirect('item-categories')->withSuccess(__('crud.common.created'));
    }

    //adding new category
    public function newCategory(Request $request){
        $category_name = $request->input('category_name');
       // $served_by = $request->input('served_by');
        $data = array(
        "category_name" => $category_name,
        );
        DB::table('category3')->insert($data);
        return redirect('item-categories')->withSuccess(__('crud.common.created'));
    }

    //adding new units
    public function newUnit(Request $request){
        $unit_name = $request->input('unit_name');
       // $served_by = $request->input('served_by');
        $data = array(
        "unit_name" => $unit_name,
        );
        DB::table('unit3')->insert($data);
        return redirect('item-categories')->withSuccess(__('crud.common.created'));
    }

    //adding new department
    public function newDepartment(Request $request){
        $department_name = $request->input('department_name');
       // $served_by = $request->input('served_by');
        $data = array(
        "department_name" => $department_name,
        );
        DB::table('department3')->insert($data);
        return redirect('item-categories')->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ItemCategory::class);

        return view('app.item_categories.create');
    }

    /**
     * @param \App\Http\Requests\ItemCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemCategoryStoreRequest $request)
    {
        $this->authorize('create', ItemCategory::class);

        $validated = $request->validated();

        $itemCategory = ItemCategory::create($validated);

        return redirect()
            ->route('item-categories.index', $itemCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ItemCategory $itemCategory)
    {
        $this->authorize('view', $itemCategory);

        return view('app.item_categories.show', compact('itemCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ItemCategory $itemCategory)
    {
        $this->authorize('update', $itemCategory);

        return view('app.item_categories.edit', compact('itemCategory'));
    }

    /**
     * @param \App\Http\Requests\ItemCategoryUpdateRequest $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        ItemCategoryUpdateRequest $request,
        ItemCategory $itemCategory
    ) {
        $this->authorize('update', $itemCategory);

        $validated = $request->validated();

        $itemCategory->update($validated);

        return redirect()
            ->route('item-categories.edit', $itemCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ItemCategory $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ItemCategory $itemCategory)
    {
        $this->authorize('delete', $itemCategory);

        $itemCategory->delete();

        return redirect()
            ->route('item-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
