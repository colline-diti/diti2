<?php

namespace App\Http\Controllers\Api;

use App\Models\ResProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResProductResource;
use App\Http\Resources\ResProductCollection;
use App\Http\Requests\ResProductStoreRequest;
use App\Http\Requests\ResProductUpdateRequest;

class ResProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resProducts = DB::table('res_products')->select('id','name','email')->get();

        $this->authorize('view-any', ResProduct::class);

        $search = $request->get('search', '');

        $resProducts = ResProduct::search($search)
            ->latest()
            ->paginate();

        return new ResProductCollection($resProducts);
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

        return new ResProductResource($resProduct);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ResProduct $resProduct)
    {
        $this->authorize('view', $resProduct);

        return new ResProductResource($resProduct);
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

        return new ResProductResource($resProduct);
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

        return response()->noContent();
    }
}
