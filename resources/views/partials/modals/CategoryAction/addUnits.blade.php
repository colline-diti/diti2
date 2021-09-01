<!-- Modal -->
<div class="modal fade none-boarder" id="addUnits" tabindex="-1" role="dialog" aria-labelledby="addTaxRatesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUnits">Add Units</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" action="{{url('store-unit')}}">
                    {{ csrf_field() }}     
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Unit Name</label>
              <input type="text" name = "unit_name" required class="form-control-label col-sm-7" placeholder="Enter Name">
            </div>       
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-sm btn-success"> <i class="ti-save-alt"></i> Save</button>
            </div>                                                                                                        
          </form>
      </div>
    </div>
  </div>
</div>