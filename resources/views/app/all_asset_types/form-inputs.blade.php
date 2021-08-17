@php $editing = isset($assetTypes) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $assetTypes->name : '')) }}"
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
            >{{ old('description', ($editing ? $assetTypes->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
