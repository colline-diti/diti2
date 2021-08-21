@php $editing = isset($unit) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="unit_name"
            label="Unit Name"
            value="{{ old('unit_name', ($editing ? $unit->unit_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="unit_description"
            label="Unit Description"
            maxlength="255"
            required
            >{{ old('unit_description', ($editing ? $unit->unit_description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
