<?php

namespace App\Http\Controllers\Api;

use App\Models\ResSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResSectionResource;
use App\Http\Resources\ResSectionCollection;
use App\Http\Requests\ResSectionStoreRequest;
use App\Http\Requests\ResSectionUpdateRequest;

class ResSectionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ResSection::class);

        $search = $request->get('search', '');

        $resSections = ResSection::search($search)
            ->latest()
            ->paginate();

        return new ResSectionCollection($resSections);
    }

    /**
     * @param \App\Http\Requests\ResSectionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResSectionStoreRequest $request)
    {
        $this->authorize('create', ResSection::class);

        $validated = $request->validated();

        $resSection = ResSection::create($validated);

        return new ResSectionResource($resSection);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSection $resSection
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ResSection $resSection)
    {
        $this->authorize('view', $resSection);

        return new ResSectionResource($resSection);
    }

    /**
     * @param \App\Http\Requests\ResSectionUpdateRequest $request
     * @param \App\Models\ResSection $resSection
     * @return \Illuminate\Http\Response
     */
    public function update(
        ResSectionUpdateRequest $request,
        ResSection $resSection
    ) {
        $this->authorize('update', $resSection);

        $validated = $request->validated();

        $resSection->update($validated);

        return new ResSectionResource($resSection);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSection $resSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ResSection $resSection)
    {
        $this->authorize('delete', $resSection);

        $resSection->delete();

        return response()->noContent();
    }
}
