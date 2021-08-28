@php $editing = isset($resSection) @endphp

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Department Name</label>
    <input type="text" 
     name="section_name" 
     class="form-control-label row col-sm-8" 
     value="{{ old('section_name', ($editing ? $resSection->section_name : '')) }}"
     required
     placeholder="Department Name">
     
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Description</label>
    <textarea type="text"
    name="description" 
    class="form-control-label row col-sm-8" 
    placeholder="Description"
    required
    >{{ old('description', ($editing ? $resSection->description : '')) }}</textarea>
</div> 