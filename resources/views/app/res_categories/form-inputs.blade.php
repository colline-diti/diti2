@php $editing = isset($resCategory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $resCategory->name : '')) }}"
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
            >{{ old('description', ($editing ? $resCategory->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

</div>
