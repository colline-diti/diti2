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
                <form method="post" action="{{url('store-discharge')}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Stock Item</label>
                        <select class="form-control-label col-sm-8" name="item_name" id="exampleFormControlSelect1">
                            <option selected="true" disabled="disabled">Choose from here</option>
                            @php
                            $items = DB::select("select * from items");
                            @endphp
                            @forelse ($items as $item)
                            <option class="form-control-label">{{ $item->item_name  ?? '-' }}</option>
                            @empty
                            <option class="form-control-label">@lang('crud.common.no_items_found')</option>
                            
                            @endif
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Quantity Out</label>
                        <input type="number" name="quantity_discharged" class="form-control-label col-sm-8" placeholder="Enter Quantity">
                    </div>
                    <div class="form-group row" hidden>
                        <label class="col-sm-3 col-form-label">Discharged By</label>
                        <input type="text" name="receved_by" value="{{ Auth::user()->name }}" class="form-control-label col-sm-8">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Date</label>
                        <input type="date" name="date" class="form-control-label col-sm-8" placeholder="Enter date">
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
