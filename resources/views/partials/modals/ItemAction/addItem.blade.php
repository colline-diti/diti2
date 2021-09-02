<!-- Modal -->
<div class="modal fade none-boarder" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addTaxRatesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaxRatesLabel">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('store-item')}}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Item Name</label>
                        <input type="text" name="item_name" class="form-control-label col-sm-7" placeholder="Enter Name">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Category</label>
                        <select class="form-control-label col-sm-7" name="category_id" id="exampleFormControlSelect1">
                            <option selected="true" disabled="disabled">Choose from here</option>
                            @php
                            $items = DB::select("SELECT * from category3");
                            @endphp
                            @forelse ($items as $item)
                            <option class="form-control-label" value="{{ $item->category_id  ?? '-' }}">{{ $item->category_name  ?? '-' }}</option>
                            @empty
                            <option class="form-control-label">@lang('crud.common.no_items_found')</option>
                            @endif
                        </select>
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
