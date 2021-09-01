<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Item Name</label>
                        <select class="form-control-label col-sm-8" name = "item_name" id="exampleFormControlSelect1">
                                <optgroup label="Sodas">
                                    <option class="form-control-label">fant</option>
                                    <option class="form-control-label">Coco</option>
                                </optgroup>
                                <optgroup label="foods">
                                    <option class="form-control-label">Rice</option>
                                    <option class="form-control-label">Cassava</option>
                                </optgroup>
                            </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category</label>
                        <select class="form-control-label col-sm-6" name = "item_category" id="exampleFormControlSelect1">
                            <option class="form-control-label">Board Meeting</option>
                            <option class="form-control-label">Workshop</option>
                            <option class="form-control-label">Daily Service</option>
                        </select>
                        <button class="btn btn-sm btn-info ml-4" data-toggle="modal" data-target="#add-category" href="{{ route('stock-tables.create') }}">
                                 <span class="glyphicon glyphicon-edit"></span>
                                 Add new Category
                             </button>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Measure Units</label>
                        <select class="form-control-label col-sm-8" name = "item_units" id="exampleFormControlSelect1">
                            <option class="form-control-label">Board Meeting</option>
                            <option class="form-control-label">Workshop</option>
                            <option class="form-control-label">Daily Service</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Total Quatity received</label>
                        <input type="number"  name = "total_recieved" class="form-control-label col-sm-8" placeholder="Number of items recieved with demages inclusive">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Demages recorded</label>
                        <input type="number"  name = "dameges" class="form-control-label col-sm-8" placeholder="Number of demages">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Actual Stock</label>
                        <input type="number" name = "acutual_amount" readonly class="form-control-label col-sm-8" placeholder="Quantity recorded">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Store Sections</label>
                        <select class="form-control-label col-sm-8" name = "store_section" id="exampleFormControlSelect1">
                            <option class="form-control-label">Cold Store</option>
                            <option class="form-control-label">Dry Store</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Remarks</label>
                        <textarea type="text" name = "remarks" class="form-control-label col-sm-8" placeholder="Reason for demage"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-sm btn-success"> <i class="ti-save-alt"></i> Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
