<!-- Modal -->
<div class="modal fade none-boarder" id="recieptUpload" tabindex="-1" role="dialog" aria-labelledby="addTaxRatesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaxRatesLabel">Upload Receipts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                <img src="image/{{ Session::get('image') }}">
                @endif
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('img.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">choose image</label>
                        <input type="file" name="image" class="form-control-label col-sm-8" placeholder="Enter Quantity">
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
