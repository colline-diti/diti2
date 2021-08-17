<?php

namespace App\Http\Controllers;

use App\Models\ResSection;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.res_sections.index', compact('resSections', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ResSection::class);

        return view('app.res_sections.create');
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

        return redirect()
            ->route('res-sections.index', $resSection)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSection $resSection
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ResSection $resSection)
    {
        $this->authorize('view', $resSection);

        return view('app.res_sections.show', compact('resSection'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ResSection $resSection
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ResSection $resSection)
    {
        $this->authorize('update', $resSection);

        return view('app.res_sections.edit', compact('resSection'));
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

        return redirect()
            ->route('res-sections.edit', $resSection)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('res-sections.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
