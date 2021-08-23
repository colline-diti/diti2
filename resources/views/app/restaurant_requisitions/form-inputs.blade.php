@php $editing = isset($restaurantRequisition) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="requisition_code"
            label="Requisition Code"
            value="{{ old('requisition_code', ($editing ? $restaurantRequisition->requisition_code : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class=" hidden col-sm-12 col-lg-6">
        <x-inputs.text
            name="status"
            label="Status"
            value="{{ old('status', ($editing ? $restaurantRequisition->status : 'Pending')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class=" hidden col-sm-12 col-lg-6">
        <x-inputs.text
            name="delivery_status"
            label="Delivery Status"
            value="{{ old('delivery_status', ($editing ? $restaurantRequisition->delivery_status : 'Not Delivered')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="Particulars"
            label="Particulars"
            value="{{ old('Particulars', ($editing ? $restaurantRequisition->Particulars : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
