@extends('layouts.lay.appbarProforma')

@section('content')
<div class="container-fluid"><br>
    <div class="row">
        <div class="col-lg- 12 p-r-0 title-margin-right">
            <h4 style="margin-bottom: 0.5em;" class="card-title">                
                <!--Put Register link-->
                <a class="btn btn-sm btn-success ml-3" href="{{ route('stock-tables.index') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Stock
                </a>
                <a class="btn btn-sm btn-info ml-1"  href="{{ route('item-categories.categories') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Discharge Stock
                </a>
                <a class="btn btn-sm btn-info ml-1" href="{{ route('stock-discharges.stockDamages') }}">
                  <span class="glyphicon glyphicon-edit">
                  Damages
              </a>                             
            </h4>
           
        </div>
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-success">                    
                    <div class="card-header border-success">
                        <ul class="nav nav-tabs card-header-tabs row">
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-current="true" href="{{ route('stock-tables.index') }}">Stock Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-success" tabindex="-1" aria-disabled="true" href="{{ route('stock-tables.addStock') }}">Add Stock</a>
                            </li>                                                  
                        </ul>
                      </div>
                      <div class="card-body"><br>                     
                        <form method="POST" action="{{ url('store-stock')}}">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>ITEM</th>
                                  <th>QUANTITY</th>                                                             
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr id="addRow">
                                  <td class="col-xs-4">                                    
                                    <select class="form-control-label addmain col-sm-12" name="item_id">
                                        <option selected="true" disabled="disabled">Select Item</option>
                                        @php
                                        $items = DB::select("SELECT * from items");
                                        @endphp
                                        @forelse ($items as $item)
                                        <option class="form-control-label" value="{{ $item->item_id  ?? '-' }}">{{ $item->item_name  ?? '-' }}</option>
                                        @empty
                                        <option class="form-control-label">@lang('crud.common.no_items_found')</option>
            
                                        @endif
                                    </select>
                                  </td>                                  
                                  <td class="col-xs-4">
                                    <input class="form-control-label addPrefer col-12" name="quantity_in" type="number" placeholder="Enter Quantity" />
                                  </td>                                                                 
                                  <td class="col-xs-4 text-center">
                                    <span class="addBtn">
                                        <i class="fa fa-plus"></i>
                                      </span>
                                  </td>
                                </tr>                                                            
                              </tbody>
                            </table> 
                              <div class="modal-footer row">
                                  <label class="col-sm- 2col-form-label">Date</label>
                                  <input style="margin-right: 14%;" type="date" name="stock_date" id="date" name="date" class="form-control-label col-sm-4">
                                  <label class="col-form-label">Upload Receipt</label>
                                  <input  type="file" name="stock_reciept" class=" col-sm-4 form-control-label">
                              </div>                   
                                <div class="modal-footer">
                                  <button style="margin-right: 19%;" type="submit" class="btn btn-sm btn-success"> <i class="ti-save-alt"></i> Save</button>
                                </div>
                          </form>
                    </div>
                </div>
            </div>

        </div>

        <!--Row 2---->
    </div>
</div>
</div>


@include('partials.footer')
</section>
</div>
@endsection
