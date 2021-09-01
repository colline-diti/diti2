@php $editing = isset($sale) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="product_name"
            label="Product Name"
            maxlength="255"
            required
            >{{ old('product_name', ($editing ? $sale->product_name : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="unit_price"
            label="Unit Price"
            value="{{ old('unit_price', ($editing ? $sale->unit_price : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="total_price"
            label="Total Price"
            value="{{ old('total_price', ($editing ? $sale->total_price : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="discounts"
            label="Discounts"
            value="{{ old('discounts', ($editing ? $sale->discounts : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="clients_id" label="Clients" required>
            @php $selected = old('clients_id', ($editing ? $sale->clients_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Clients</option>
            @foreach($allClients as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="payment_types_id" label="Payment Types" required>
            @php $selected = old('payment_types_id', ($editing ? $sale->payment_types_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Payment Types</option>
            @foreach($allPaymentTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
