[[@extends('layouts.appbar')
@extends('layouts.lay.SalespointScript')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Make A Requisitions</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Make A Requisitions</a>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
      @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
        <div class="row">
          <form method="post" action="{{url('store-form')}}">
          {{ csrf_field() }}    
            <div class="col-lg-12">
                <div class="card border-success">
                    <div class="row">
                        <div class="col-lg-7" >
                            <div class="card border-success" data-title="Access the Restuarent Dashboard">
                                                                
                                <h4>Products/Services Billing</h4>
                                <form action="reciepts" method="Post">
                                <!-- <div class="row hidden-print">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <select  name="paymet_type" aria-placeholder="add new client"
                                                        class="form-control form-control-line">
                                                        <option>Take away client</option>
                                                        <option>DIT staff</option>
                                                        <option>Other</option>
                                                    <select>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                <button type="button" class="btn btn-sm btn-primary btn-purchase"
                                                name="perchase">Add new Client</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                            <div class="row hidden-print">
                                        <div class="col-md-4">
                                            
                                            ITEM
                                        </div>
                                        <div class="col-md-4">
                                            
                                        UNIT PRICE
                                        </div>
                                        <div class="col-md-4">
                                        QUANTITY
                                        </div>
                                     q,   </div >   
                                                <div class="cart-items">
                                                </div>

                                            </tr>
                                        </thead>
                                        <tbody class="cart-items">

                                        </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th style="background-color:skyblue;">@lang('crud.reciepts.inputs.total')(UGX)</th>
                                                    <th colspan="2"><strong class="primary-color"><input type="text" name="total"
                                                                required="required" class="cart-total-price form-control"
                                                                 style="font-size:50px;" id="total"
                                                                placeholder="0"></strong></th>
                                                </tr>
                                                <tr>
                                                    <th style="background-color:skyblue;">@lang('crud.reciepts.inputs.cash')(Ugx)</th>
                                                    <td colspan="2"><strong class="primary-color"><input type="text" id="cash"
                                                                onkeyup="bal()" min="0" class="form-control" placeholder="0" name="cash"
                                                                required style="font-size:50px;"></strong></td>

                                                </tr>
                                                <tr>
                                                    <th style="background-color:skyblue;"> @lang('crud.reciepts.inputs.change')(Ugx)</th>
                                                    <th colspan="2" class="total"><strong class="primary-color"><input type="text"
                                                                id="balance" min="0" value="" placeholder="0" class="form-control"
                                                                 name="balance" style="font-size:50px;"></strong>
                                                    </th>

                                                </tr>
                                                <tr>
                                                    <th style="background-color:skyblue;">@lang('crud.reciepts.inputs.balance')(Ugx)</th>
                                                    <th colspan="2" class="total"><strong class="primary-color"><input type="text"
                                                                id="debt" min="0" value="" placeholder="0" class="form-control"
                                                                 name="debt" style="font-size:50px;"></strong></th>

                                                </tr>
                                            </tfoot>
                                    </table>
                                  
                                    <div class="row hidden-print">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"> @lang('crud.reciepts.inputs.served_by')</label>
                                                <div class="col-md-12">
                                                    <input type="text" style="pointer-events: none;"
                                                        value="{{ Auth::user()->name }}"
                                                        name="served_by" class="form-control form-control-line">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12">Discounts(if any):</label>
                                                <div class="col-md-12">
                                                    <input text  name="discount" placeholder="enter amount here"
                                                        class="form-control form-control-line">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12">Payment Type:</label>
                                                <div class="col-md-12">
                                                    <select  name="paymet_type"
                                                        class="form-control form-control-line">
                                                        <option>Cash</option>
                                                        <option>Credit</option>
                                                        <option>Check</option>
                                                        <option>Mobile Money</option>
                                                        <option>Other</option>
                                                    <select>
                                                
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    
                                    <div class="row">
                                        <!--row-->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                </div>
                                            </div>
                                        </div>
                                            <th colspan="2" style="border:0"> <button type="submit" class="btn btn-sm btn-primary btn-purchase"
                                                name="perchase">PURCHASE</button>
                                            </th>
                                    </div>
                                        <!--/row-->                                
                                        <!-- Button trigger modal -->
                                        <!--itmes col-->                   
                                        </div>
                                    </div>
                                    </form>

                                <div class="col-lg-5">
                                        <div class="card border-success" data-title="Access the Inventory Dashboard">
                                            <div class="container">
                                                <h4>Search for product</h4>
                                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search...">
                                                <ul id="result" class="user-list">
                                                    @php
                                                    //DB::table('user')->where('email', $userEmail)->update(array('member_type' => $plan));
                                                    $resProducts =  DB::select("select * from res_products"); 
                                                    //$resProducts = array("Volvo", "BMW", "Toyota");
                                                @endphp
                                                    @forelse ($resProducts as $resProduct)
                                                
                                                <div class="shop-items hidden-print" id="myUL">
                                                     
                                                <li>
                                                   
                                                                        <!--Available products-->
                                                                        <div class="shop-item">
                                                                            <p class="shop-item-title" style="color:black"><a
                                                                                    href="#">{{ $resProduct->product_name }}</a></p>
                                                                            <div class="shop-item-details">
                                                                                <span class="shop-item-price"
                                                                                    style="color:black">{{ $resProduct->product_price }}</span>
                                                                                <span class="shop-item-quantity"
                                                                                    style="color:black;display:none;">{{ $resProduct->product_price }}</span>
                                                                                <button class="btn btn-sm btn-primary shop-item-button" type="button">ADD TO
                                                                                    BILL</button>
                                                                            </div>
                                                                            @empty
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    @lang('crud.common.no_items_found')
                                                                                </td>
                                                                            </tr>
                                                                            @endif
                                                                        <hr style="color:black;width:100%;">
                                                                        </div>
                                                                    </div>
                                        
                                                                    </div>
                                                </li>
                                                </ul>
                                            </div>
                                        
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                    </div>                     
                                </div>
                    
                            </div>
        
    </section>
</div>

@include('partials.footer') 
@endsection

]]