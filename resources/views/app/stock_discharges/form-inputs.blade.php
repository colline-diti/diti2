@php $editing = isset($stockDischarge) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="quantity_issued"
            label="Quantity Issued"
            value="{{ old('quantity_issued', ($editing ? $stockDischarge->quantity_issued : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="stock_table_id" label="Stock Table" required>
            @php $selected = old('stock_table_id', ($editing ? $stockDischarge->stock_table_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Stock Table</option>
            @foreach($stockTables as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="unit_id" label="Unit" required>
            @php $selected = old('unit_id', ($editing ? $stockDischarge->unit_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Unit</option>
            @foreach($units as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="res_section_id" label="Res Section" required>
            @php $selected = old('res_section_id', ($editing ? $stockDischarge->res_section_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Res Section</option>
            @foreach($resSections as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.date
            name="return_date"
            label="Return Date"
            value="{{ old('return_date', ($editing ? optional($stockDischarge->return_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="remarks"
            label="Remarks"
            maxlength="255"
            required
            >{{ old('remarks', ($editing ? $stockDischarge->remarks : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="issued_by"
            label="Issued By"
            value="{{ old('issued_by', ($editing ? $stockDischarge->issued_by : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $stockDischarge->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
