@php $editing = isset($paymentTypes) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="payment_name"
            label="Payment Name"
            value="{{ old('payment_name', ($editing ? $paymentTypes->payment_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $paymentTypes->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
