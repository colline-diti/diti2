<!-- Modal -->
<div class="modal fade none-boarder" id="dischargeStock" tabindex="-1" role="dialog" aria-labelledby="addTaxRatesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTaxRatesLabel">Discharge Stock</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>           
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Stock Item</label>
                  <select class="form-control-label col-sm-8" id="exampleFormControlSelect1">
                      <option class="form-control-label">Sugar</option>
                      <option class="form-control-label" >Rice</option>
                      <option class="form-control-label" >Fanta</option>                  
                  </select>
              </div>  
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Quantity Out</label>
                <input type="text" class="form-control-label col-sm-8" placeholder="Enter Quantity">
              </div>       
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-success"> <i class="ti-save-alt"></i> Save</button>
              </div>                                                                                                        
            </form>
        </div>
      </div>
    </div>
  </div>