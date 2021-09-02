<!-- Modal -->
<div class="modal fade none-boarder" id="addDamage" tabindex="-1" role="dialog" aria-labelledby="addTaxRatesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Report Damages</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ url('store-damages')}}">
                  {{ csrf_field() }}
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Stock Item</label>
                      <select class="form-control-label col-sm-8" name="item_id" id="exampleFormControlSelect1">
                          <option selected="true" disabled="disabled">Select Item</option>
                          @php
                          $items = DB::select("select * from items");
                          @endphp
                          @forelse ($items as $item)
                          <option class="form-control-label" value="{{ $item->item_id  ?? '-' }}">{{ $item->item_name  ?? '-' }}</option>
                          @empty
                          <option class="form-control-label">@lang('crud.common.no_items_found')</option>
                          
                          @endif
                      </select>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Quantity </label>
                      <input type="number" name="quantity" class="form-control-label col-sm-8" placeholder="Enter Quantity">
                  </div>
                  <div class="form-group row" hidden>
                      <label class="col-sm-3 col-form-label">Discharged By</label>
                      <input type="text" name="user_id" value="{{ Auth::user()->id }}" class="form-control-label col-sm-8">
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Remarks</label>
                    <input type="text" name="remarks" class="form-control-label col-sm-8" placeholder="Reason for Damages">
                 </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date</label>
                      <input type="date" name="damage_date" class="form-control-label col-sm-8" placeholder="Enter date">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-sm btn-success"> <i class="ti-save-alt"></i> Discharge</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
