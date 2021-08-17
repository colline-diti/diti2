<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RestaurantRequisition;
use App\Http\Resources\RestaurantRequisitionResource;
use App\Http\Resources\RestaurantRequisitionCollection;
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
            ->paginate();

        return new RestaurantRequisitionCollection($restaurantRequisitions);
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

        return new RestaurantRequisitionResource($restaurantRequisition);
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

        return new RestaurantRequisitionResource($restaurantRequisition);
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

        return new RestaurantRequisitionResource($restaurantRequisition);
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

        return response()->noContent();
    }
}
