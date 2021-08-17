@extends('layouts.appbar')
@extends('layouts.lay.SalespointScript')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hello, {{ Auth::user()->name }} <span>Welcome Here</span></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Restuarant</a>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <form action= "/res-products" method="POST">
                {{ csrf_field() }}    
            <div class="col-lg-12">
                <div class="card border-success">
                    <div class="row">
                        <div class="col-lg-7" >
                                <div class="card border-success" data-title="Access the Restuarent Dashboard">
                                                                
                                    <h4>Medication/Treatment Billing</h4>
                                    <!--Treatment 0ne-->
                                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <div class="cart-row">
                                                    <span class="cart-item cart-header cart-column">ITEM</span>
                                                    <span class="cart-price cart-header cart-column">UNIT PRICE</span>
                                                    <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                                                </div>
                                                <div class="cart-items">
                                                </div>

                                            </tr>
                                        </thead>
                                        <tbody class="cart-items">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="background-color:skyblue;">TOTAL COST(Ug.shs)</th>
                                                <th colspan="2"><strong class="primary-color"><input type="text" name="total"
                                                            required="required" class="cart-total-price form-control"
                                                            readonly="readonly" style="font-size:50px;" id="total"
                                                            placeholder="0"></strong></th>
                                            </tr>
                                            <tr>
                                                <th style="background-color:skyblue;">CASH(Ug.shs)</th>
                                                <td colspan="2"><strong class="primary-color"><input type="text" id="cash"
                                                            onkeyup="bal()" min="0" class="form-control" placeholder="0" name="cash"
                                                            required style="font-size:50px;"></strong></td>

                                            </tr>
                                            <tr>
                                                <th style="background-color:skyblue;">Change(Ug.shs)</th>
                                                <th colspan="2" class="total"><strong class="primary-color"><input type="text"
                                                            id="balance" min="0" value="" placeholder="0" class="form-control"
                                                            readonly="readonly" name="balance" style="font-size:50px;"></strong>
                                                </th>

                                            </tr>
                                            <tr>
                                                <th style="background-color:skyblue;">Bal/Debt(Ug.shs)</th>
                                                <th colspan="2" class="total"><strong class="primary-color"><input type="text"
                                                            id="debt" min="0" value="" placeholder="0" class="form-control"
                                                            readonly="readonly" name="debt" style="font-size:50px;"></strong></th>

                                            </tr>
                                        </tfoot>
                                    </table>

                                    
                                    <div class="row hidden-print">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Served By:</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="noteditable"
                                                        value="Tazuba"
                                                        name="served_by" class="form-control form-control-line">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-12">Date</label>
                                                <div class="col-md-12">
                                                    <input style="pointer-events: none;" type="text" name="date"
                                                        value="date"
                                                        class="form-control form-control-line">
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
                                        <th colspan="2" style="border:0"> <button type="submit" class="btn btn-primary btn-purchase"
                                                name="perchase">PURCHASE</button></th>


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
                                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search">
                                                    
                                                        <header class="header">
                                                        </header>
                                                
                                                        <ul id="result" class="user-list">
                                                        <li>
                                                                <div class="shop-items hidden-print" id="myUL">
                                                                                <!--Available products-->
                                                                                @php
                                                                                //DB::table('user')->where('email', $userEmail)->update(array('member_type' => $plan));
                                                                                $resProducts =  DB::select("select * from res_products"); 
                                                                                //$resProducts = array("Volvo", "BMW", "Toyota");
                                                                            @endphp
                                                                                @forelse ($resProducts as $resProduct)
                                                                                <div class="shop-item">
                                                                                    <p class="shop-item-title" style="color:black"><a
                                                                                            href="#">{{ $resProduct->product_name }}</a></p>
                                                                                    <div class="shop-item-details">
                                                                                        <span class="shop-item-price"
                                                                                            style="color:black">3456</span>
                                                                                        <span class="shop-item-quantity"
                                                                                            style="color:black;display:none;">6</span>
                                                                                        <button class="btn btn-primary shop-item-button" type="button">ADD TO
                                                                                            BILL</button>
                                                                                    </div>
                                                                                    @empty
                                                                                    <p>sdfghj</p>
                                                                                   
                                                                                    @endif
                                                                                <hr style="color:black;width:100%;">
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

