<?php

namespace App\Http\Controllers\Api;

use App\Models\ResProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResSalesTableResource;
use App\Http\Resources\ResSalesTableCollection;

class ResProductResSalesTablesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ResProduct $resProduct)
    {
        $this->authorize('view', $resProduct);

        $search = $request->get('search', '');

        $resSalesTables = $resProduct
            ->resSalesTables()
            ->search($search)
            ->latest()
            ->paginate();

        return new ResSalesTableCollection($resSalesTables);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResProduct $resProduct
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ResProduct $resProduct)
    {
        $this->authorize('create', ResSalesTable::class);

        $validated = $request->validate([
            'product_name' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
        ]);

        $resSalesTable = $resProduct->resSalesTables()->create($validated);

        return new ResSalesTableResource($resSalesTable);
    }
}
