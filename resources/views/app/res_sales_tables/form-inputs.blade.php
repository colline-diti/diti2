@php $editing = isset($resSalesTable) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="product_name"
            label="Product Name"
            value="{{ old('product_name', ($editing ? $resSalesTable->product_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="price"
            label="Price"
            value="{{ old('price', ($editing ? $resSalesTable->price : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="res_product_id" label="Res Product" required>
            @php $selected = old('res_product_id', ($editing ? $resSalesTable->res_product_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Res Product</option>
            @foreach($resProducts as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
