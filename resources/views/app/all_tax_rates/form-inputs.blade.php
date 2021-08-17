@php $editing = isset($taxRates) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="tax_name"
            label="Tax Name"
            value="{{ old('tax_name', ($editing ? $taxRates->tax_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="rate"
            label="Rate"
            value="{{ old('rate', ($editing ? $taxRates->rate : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
