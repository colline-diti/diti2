@php $editing = isset($product) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="product_name"
            label="Product Name"
            value="{{ old('product_name', ($editing ? $product->product_name : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="unit_cost"
            label="Unit Cost"
            value="{{ old('unit_cost', ($editing ? $product->unit_cost : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="invoices_id" label="Invoices" required>
            @php $selected = old('invoices_id', ($editing ? $product->invoices_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Invoices</option>
            @foreach($allInvoices as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
