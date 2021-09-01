<!-- Modal -->
<div class="modal fade none-boarder" id="addTaxRates" tabindex="-1" role="dialog" aria-labelledby="addTaxRatesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTaxRatesLabel">Add Tax Rates</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Description</label>
              <input type="text" class="form-control-label col-sm-8" placeholder="Decsription">
            </div>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Rate %</label>
                  <select class="form-control-label col-sm-8" id="exampleFormControlSelect1">
                      <option class="form-control-label">1</option>
                      <option class="form-control-label" >3</option>
                      <option class="form-control-label" >-1</option>
                      <option class="form-control-label" >4</option>
                  </select>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Set as Default</label>
                <input type="checkbox">
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