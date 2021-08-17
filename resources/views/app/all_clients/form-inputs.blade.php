@php $editing = isset($clients) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $clients->name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="contact"
            label="Contact"
            value="{{ old('contact', ($editing ? $clients->contact : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $clients->email : '')) }}"
            maxlength="255"
            required
        ></x-inputs.email>
    </x-inputs.group>
</div>
