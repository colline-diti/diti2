<?php

namespace App\Http\Controllers;

use App\Models\Reciept;
use App\Models\ResProduct;
use Illuminate\Http\Request;
use App\Http\Requests\RecieptStoreRequest;
use App\Http\Requests\RecieptUpdateRequest;

use DB;


class RecieptController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Reciept::class);

        $search = $request->get('search', '');

        $reciepts = Reciept::search($search)
            ->latest()
            ->paginate(5);

        return view('app.reciepts.index', compact('reciepts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Reciept::class);

        $resProducts = ResProduct::pluck('product_name', 'id');

        return view('app.reciepts.create', compact('resProducts'));
    }

    /**
     * @param \App\Http\Requests\RecieptStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecieptStoreRequest $request)
    {
        $this->authorize('create', Reciept::class);

        $validated = $request->validated();

        $reciept = Reciept::create($validated);

        return redirect()
            ->route('reciepts.index', $reciept)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reciept $reciept
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Reciept $reciept)
    {
        
        $this->authorize('view', $reciept);

        return view('app.reciepts.show', compact('reciept'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reciept $reciept
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Reciept $reciept)
    {
        $this->authorize('update', $reciept);

        $resProducts = ResProduct::pluck('product_name', 'id');

        return view('app.reciepts.edit', compact('reciept', 'resProducts'));
    }

    /**
     * @param \App\Http\Requests\RecieptUpdateRequest $request
     * @param \App\Models\Reciept $reciept
     * @return \Illuminate\Http\Response
     */
    public function update(RecieptUpdateRequest $request, Reciept $reciept)
    {
        $this->authorize('update', $reciept);

        $validated = $request->validated();

        $reciept->update($validated);

        return redirect()
            ->route('reciepts.edit', $reciept)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reciept $reciept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reciept $reciept)
    {
        $this->authorize('delete', $reciept);

        $reciept->delete();

        return redirect()
            ->route('reciepts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
