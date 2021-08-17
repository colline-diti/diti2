@php $editing = isset($expesesResturant) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="particulars"
            label="Particulars"
            value="{{ old('particulars', ($editing ? $expesesResturant->particulars : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            value="{{ old('quantity', ($editing ? $expesesResturant->quantity : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="rate"
            label="Rate"
            value="{{ old('rate', ($editing ? $expesesResturant->rate : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="ammount"
            label="Ammount"
            value="{{ old('ammount', ($editing ? $expesesResturant->ammount : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
