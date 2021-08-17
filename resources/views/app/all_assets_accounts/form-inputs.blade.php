@php $editing = isset($assetsAccounts) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="asset_name"
            label="Asset Name"
            value="{{ old('asset_name', ($editing ? $assetsAccounts->asset_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            value="{{ old('quantity', ($editing ? $assetsAccounts->quantity : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="supplier"
            label="Supplier"
            value="{{ old('supplier', ($editing ? $assetsAccounts->supplier : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="price"
            label="Price"
            value="{{ old('price', ($editing ? $assetsAccounts->price : '')) }}"
            max="255"
            step="0.01"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="asset_types_id" label="Asset Types" required>
            @php $selected = old('asset_types_id', ($editing ? $assetsAccounts->asset_types_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Asset Types</option>
            @foreach($allAssetTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
