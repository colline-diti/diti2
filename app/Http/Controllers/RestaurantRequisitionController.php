<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantRequisition;
use App\Http\Requests\RestaurantRequisitionStoreRequest;
use App\Http\Requests\RestaurantRequisitionUpdateRequest;

class RestaurantRequisitionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', RestaurantRequisition::class);

        $search = $request->get('search', '');

        $restaurantRequisitions = RestaurantRequisition::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.restaurant_requisitions.index',
            compact('restaurantRequisitions', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', RestaurantRequisition::class);

        return view('app.restaurant_requisitions.create');
    }

    /**
     * @param \App\Http\Requests\RestaurantRequisitionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequisitionStoreRequest $request)
    {
        $this->authorize('create', RestaurantRequisition::class);

        $validated = $request->validated();

        $restaurantRequisition = RestaurantRequisition::create($validated);

        return redirect()
            ->route('restaurant-requisitions.index', $restaurantRequisition)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RestaurantRequisition $restaurantRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        RestaurantRequisition $restaurantRequisition
    ) {
        $this->authorize('view', $restaurantRequisition);


        return view(
            'app.restaurant_requisitions.show',
            compact('restaurantRequisition')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RestaurantRequisition $restaurantRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        RestaurantRequisition $restaurantRequisition
    ) {
        $this->authorize('update', $restaurantRequisition);

        return view(
            'app.restaurant_requisitions.edit',
            compact('restaurantRequisition')
        );
    }

    /**
     * @param \App\Http\Requests\RestaurantRequisitionUpdateRequest $request
     * @param \App\Models\RestaurantRequisition $restaurantRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(
        RestaurantRequisitionUpdateRequest $request,
        RestaurantRequisition $restaurantRequisition
    ) {
        $this->authorize('update', $restaurantRequisition);

        $validated = $request->validated();

        $restaurantRequisition->update($validated);

        return redirect()
            ->route('restaurant-requisitions.edit', $restaurantRequisition)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RestaurantRequisition $restaurantRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        RestaurantRequisition $restaurantRequisition
    ) {
        $this->authorize('delete', $restaurantRequisition);

        $restaurantRequisition->delete();

        return redirect()
            ->route('restaurant-requisitions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
