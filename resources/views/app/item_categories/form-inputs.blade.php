@php $editing = isset($itemCategory) @endphp

<div class="form-group row">
    <label class="col-sm-3 col-form-label">Category Name</label>
    <input type="text" 
     name="name" 
     class="form-control-label row col-sm-8" 
     value="{{ old('name', ($editing ? $itemCategory->name : '')) }}"
     required
     placeholder="Category Name">
     
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Description</label>
    <textarea type="text"
    name="description" 
    class="form-control-label row col-sm-8"     
    required
    placeholder="Description"
    >{{ old('description', ($editing ? $itemCategory->description : ''))}}</textarea>
</div> 
