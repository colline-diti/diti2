<?php

namespace App\Http\Controllers;

use App\Models\PaymentTypes;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view(
            'app.all_payment_types.index',
            compact('allPaymentTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', PaymentTypes::class);

        return view('app.all_payment_types.create');
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

        return redirect()
            ->route('all-payment-types.index', $paymentTypes)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentTypes $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PaymentTypes $paymentTypes)
    {
        $this->authorize('view', $paymentTypes);

        return view('app.all_payment_types.show', compact('paymentTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentTypes $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PaymentTypes $paymentTypes)
    {
        $this->authorize('update', $paymentTypes);

        return view('app.all_payment_types.edit', compact('paymentTypes'));
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

        return redirect()
            ->route('all-payment-types.edit', $paymentTypes)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('all-payment-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
