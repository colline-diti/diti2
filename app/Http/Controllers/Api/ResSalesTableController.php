<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ResSalesTable;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResSalesTableResource;
use App\Http\Resources\ResSalesTableCollection;
use App\Http\Requests\ResSalesTableStoreRequest;
use App\Http\Requests\ResSalesTableUpdateRequest;

class ResSalesTableController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ResSalesTable::class);

        $search = $request->get('search', '');

        $resSalesTables = ResSalesTable::search($search)
            ->latest()
            ->paginate();

        return new ResSalesTableCollection($resSalesTables);
    }

    /**
     * @param \App\Http\Requests\ResSalesTableStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResSalesTableStoreRequest $request)
    {
        $this->authorize('create', ResSalesTable::class);

        $validated = $request->validated();

        $resSalesTable = ResSalesTable::create($validated);

        return new ResSalesTableResource($resSalesTable);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSalesTable $resSalesTable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ResSalesTable $resSalesTable)
    {
        $this->authorize('view', $resSalesTable);

        return new ResSalesTableResource($resSalesTable);
    }

    /**
     * @param \App\Http\Requests\ResSalesTableUpdateRequest $request
     * @param \App\Models\ResSalesTable $resSalesTable
     * @return \Illuminate\Http\Response
     */
    public function update(
        ResSalesTableUpdateRequest $request,
        ResSalesTable $resSalesTable
    ) {
        $this->authorize('update', $resSalesTable);

        $validated = $request->validated();

        $resSalesTable->update($validated);

        return new ResSalesTableResource($resSalesTable);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSalesTable $resSalesTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ResSalesTable $resSalesTable)
    {
        $this->authorize('delete', $resSalesTable);

        $resSalesTable->delete();

        return response()->noContent();
    }
}
