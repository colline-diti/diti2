@php $editing = isset($pettyCash) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="details"
            label="Details"
            maxlength="255"
            required
            >{{ old('details', ($editing ? $pettyCash->details : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="debit"
            label="Debit"
            value="{{ old('debit', ($editing ? $pettyCash->debit : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="credit"
            label="Credit"
            value="{{ old('credit', ($editing ? $pettyCash->credit : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select
            name="expeses_resturant_id"
            label="Expeses Resturant"
            required
        >
            @php $selected = old('expeses_resturant_id', ($editing ? $pettyCash->expeses_resturant_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Expeses Resturant</option>
            @foreach($expesesResturants as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
