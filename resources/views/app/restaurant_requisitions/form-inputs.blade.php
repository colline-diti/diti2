@php $editing = isset($restaurantRequisition) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="item_name"
            label="Item Name"
            value="{{ old('item_name', ($editing ? $restaurantRequisition->item_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            value="{{ old('quantity', ($editing ? $restaurantRequisition->quantity : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="dateofDelivery"
            label="Dateof Delivery"
            value="{{ old('dateofDelivery', ($editing ? $restaurantRequisition->dateofDelivery : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="status"
            label="Status"
            value="{{ old('status', ($editing ? $restaurantRequisition->status : 'Pending')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Particulars"
            label="Particulars"
            value="{{ old('Particulars', ($editing ? $restaurantRequisition->Particulars : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
