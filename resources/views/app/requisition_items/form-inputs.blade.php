@php $editing = isset($requisitionItem) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $requisitionItem->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select
            name="restaurant_requisition_id"
            label="Restaurant Requisition"
            required
        >
            @php $selected = old('restaurant_requisition_id', ($editing ? $requisitionItem->restaurant_requisition_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Restaurant Requisition</option>
            @foreach($restaurantRequisitions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
