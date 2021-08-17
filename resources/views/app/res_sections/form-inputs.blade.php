@php $editing = isset($resSection) @endphp

<div class="row">
    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="section_name"
            label="Section Name"
            value="{{ old('section_name', ($editing ? $resSection->section_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $itemCategory->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
