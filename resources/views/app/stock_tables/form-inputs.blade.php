@php $editing = isset($stockTable) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="item_name"
            label="Item Name"
            value="{{ old('item_name', ($editing ? $stockTable->item_name : '')) }}"
            minlength="3"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            value="{{ old('quantity', ($editing ? $stockTable->quantity : '')) }}"
            max="255"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12  col-lg-6">
        <x-inputs.textarea name="unit" label="Unit" maxlength="255" required
            >{{ old('unit', ($editing ? $stockTable->unit : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="buying_price"
            label="Buying Price"
            value="{{ old('buying_price', ($editing ? $stockTable->buying_price : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="item_category_id" label="Item Category" required>
            @php $selected = old('item_category_id', ($editing ? $stockTable->item_category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Item Category</option>
            @foreach($itemCategories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="remarks"
            label="Remarks"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $stockTable->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
