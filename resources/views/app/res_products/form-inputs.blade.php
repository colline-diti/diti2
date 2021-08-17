@php $editing = isset($resProduct) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="product_name"
            label="Product Name"
            value="{{ old('product_name', ($editing ? $resProduct->product_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="product_price"
            label="Product Price"
            value="{{ old('product_price', ($editing ? $resProduct->product_price : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>  

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="res_category_id" label="Res Category" required>
            @php $selected = old('res_category_id', ($editing ? $resProduct->res_category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Res Category</option>
            @foreach($resCategories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
