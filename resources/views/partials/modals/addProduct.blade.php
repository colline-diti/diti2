<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
              <label class="col-sm-3 col-form-label">Name</label>
              <input type="text" class="form-control-label col-sm-8" placeholder="Product Name">
            </div>            
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Event</label>
                <select class="form-control-label col-sm-8" id="exampleFormControlSelect1">
                  <option class="form-control-label">Board Meeting</option>
                  <option class="form-control-label">Workshop</option>
                  <option class="form-control-label" >Daily Service</option>                   
                </select>
            </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Description</label>
                <textarea type="text" class="form-control-label col-sm-8" placeholder="Description"></textarea>
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