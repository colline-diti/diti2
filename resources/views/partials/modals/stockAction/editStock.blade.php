<!-- Modal -->
<div class="modal fade" id="editStock" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Edit Stock Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('edit-stock')}}" id="editform">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <input type = "text"  id = "id">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Item Name</label>
                        <select class="form-control-label col-sm-8" name="item_name" id="item_name exampleFormControlSelect1">
                            <optgroup label="Soda">
                            <option selected="true" disabled="disabled">Choose
                                                            from here</option>
                           
                                <option class="form-control-label">Fanta</option>
                                <option class="form-control-label">Soda</option>
                            </optgroup>
                            <optgroup label="Foods">
                            <option selected="true" disabled="disabled">Choose
                                                            from here</option>
                           
                                <option class="form-control-label">Rice</option>
                                <option class="form-control-label">Posho</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Item Category</label>
                        <select class="form-control-label col-sm-8" name="item_category" id="item_category exampleFormControlSelect1">
                            <option selected="true" disabled="disabled">Choose from here</option>
                            <option>Food Stuffs</option>
                            <option>Equipement</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Measure Units</label>
                        <select class="form-control-label col-sm-8" name="item_units" id="item_units exampleFormControlSelect1">
                            <option selected="true" disabled="disabled">Choose from here</option>
                            <option class="form-control-label">Kilograms</option>
                            <option class="form-control-label">Clusters</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Quantity In</label>
                        <input type="number" name="total_recieved" id = "total_recieve" class="form-control-label col-sm-8" placeholder="Enter new stock">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Damages Recorded</label>
                        <input type="number" name="dameges" id = "dameges" class="form-control-label col-sm-8" placeholder="Enter damages">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Actual Stock</label>
                        <input type="text" name="acutual_amount" id = "acutual_amount" class="form-control-label col-sm-8" placeholder="Exact Stock">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Store Section</label>
                        <select class="form-control-label col-sm-8" name="store_section" id="store_section exampleFormControlSelect1">
                            <option selected="true" disabled="disabled">Choose from here</option>
                            <option class="form-control-label">Dry Store</option>
                            <option class="form-control-label">Cold Store</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Remarks</label>
                        <input type="text" name="remarks" id = "remarks" class="form-control-label col-sm-8" placeholder="Reason for demage">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Date</label>
                        <input type="date" name="date" id = "date" class="form-control-label col-sm-8">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Recieved by</label>
                        <input type="text" name="receved_by" id = "receved_by" class="form-control-label col-sm-8" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-success"> <i class="ti-save-alt"></i> Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
