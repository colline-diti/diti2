@php $editing = isset($unit) @endphp

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Department Name</label>
    <input type="text" 
     name="unit_name" 
     class="form-control-label row col-sm-8" 
     value="{{ old('unit_name', ($editing ? $unit->unit_name : '')) }}"
     required
     placeholder="Department Name">
     
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Description</label>
    <textarea type="text"
    name="unit_description" 
    class="form-control-label row col-sm-8" 
    placeholder="Description"
    required
    >{{ old('unit_description', ($editing ? $unit->unit_description : '')) }}</textarea>
</div> 