<?php

namespace App\Http\Controllers\Api;

use App\Models\PaymentTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentTypesResource;
use App\Http\Resources\PaymentTypesCollection;
use App\Http\Requests\PaymentTypesStoreRequest;
use App\Http\Requests\PaymentTypesUpdateRequest;

class PaymentTypesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PaymentTypes::class);

        $search = $request->get('search', '');

        $allPaymentTypes = PaymentTypes::search($search)
            ->latest()
            ->paginate();

        return new PaymentTypesCollection($allPaymentTypes);
    }

    /**
     * @param \App\Http\Requests\PaymentTypesStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentTypesStoreRequest $request)
    {
        $this->authorize('create', PaymentTypes::class);

        $validated = $request->validated();

        $paymentTypes = PaymentTypes::create($validated);

        return new PaymentTypesResource($paymentTypes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentTypes $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PaymentTypes $paymentTypes)
    {
        $this->authorize('view', $paymentTypes);

        return new PaymentTypesResource($paymentTypes);
    }

    /**
     * @param \App\Http\Requests\PaymentTypesUpdateRequest $request
     * @param \App\Models\PaymentTypes $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function update(
        PaymentTypesUpdateRequest $request,
        PaymentTypes $paymentTypes
    ) {
        $this->authorize('update', $paymentTypes);

        $validated = $request->validated();

        $paymentTypes->update($validated);

        return new PaymentTypesResource($paymentTypes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentTypes $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PaymentTypes $paymentTypes)
    {
        $this->authorize('delete', $paymentTypes);

        $paymentTypes->delete();

        return response()->noContent();
    }
}
