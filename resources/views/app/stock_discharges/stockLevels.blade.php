@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Stock Levels</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('item-categories.index') }}"> Item Categories</a>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-success">
                    <div class="card-header border-success">
                        <h4  class="card-title">
                            <!-- Create new User-->
                            <a><span class="glyphicon glyphicon-edit"></span>
                               Stock Level Status:
                            </a>                          

                            <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}"><span><i class="ti-angle-double-left"></i>
                                    Back </span>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 float-right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="margin-bottom: 0.5em;" class="card-title">
                                    <!-- Create new User-->
                                    <a><span class="glyphicon glyphicon-edit"></span>
                                        Stock Discharges
                                    </a>
                                    <!--Put Register link-->
                                    <button class="btn btn-sm btn-danger">
                                        <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                        Export to PDF
                                    </button>
                                    <button class="btn btn-sm btn-success ml-4">
                                        <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                        Export to excel
                                    </button>
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover" id="items">
                                        <thead>
                                            <tr>
                                                <th width= "30%" class="text-left">
                                                    Item
                                                </th>
                                                <th width= "20%" class="text-left">
                                                    Quantity 
                                                </th>
                                                <th width= "50%" class="text-left">
                                                   Discharged by
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $items = DB::select("select * from stock_discharge3");
                                            @endphp
                                            @forelse ($items as $itemCategory) <tr>
                                                <td>{{ $itemCategory->Item_name ?? '-' }}</td>
                                                <td>{{ $itemCategory->quantity_discharged  ?? '-' }}</td>
                                                <td class="text-left">{{ $itemCategory->discharged_by  ?? '-' }}</td>
                                                
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2">
                                                    @lang('crud.common.no_items_found')
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <h4 style="margin-bottom: 0.3em;" class="card-title">
                                        <!-- Create new User-->
                                        <a><span class="glyphicon glyphicon-edit"></span>
                                            Available Stock
                                        </a>
                                        <!--Put Register link-->
                                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#addItem" href="">
                                            <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                            Export to PDF
                                        </a>
                                        <a class="btn btn-sm btn-success ml-4" data-toggle="modal" data-target="#addCategory" href="">
                                            <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                            Export to excel
                                        </a>
                                    </h4>
                                    <table class="table table-borderless table-hover" id="categories">
                                        <thead>
                                            <tr>
                                                <th width ="50%" class="text-left">
                                                    Item
                                                </th>
                                                <th width ="50%" class="text-left">
                                                    Quantity in stock
                                                </th>                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $items = DB::select("SELECT * FROM available_stock");
                                            @endphp
                                            @forelse ($items as $itemCategory) <tr>
                                                <td>{{ $itemCategory->Name  ?? '-' }}</td>
                                                <td class="text-left" >{{ $itemCategory->instock  ?? '-' }} {{ $itemCategory->units  ?? '-' }}</td>
                                                
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2">
                                                    @lang('crud.common.no_items_found')
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">                                                    
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <h4 style="margin-bottom: 0.5em;" class="card-title">
                                <!-- Create new User-->
                                <a><span class="glyphicon glyphicon-edit"></span>
                                    Available units
                                </a>
                                <!--Put Register link-->
                                <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#addItem" href="">
                                    <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                    Export to PDF
                                </a>
                                <a class="btn btn-sm btn-success ml-4" data-toggle="modal" data-target="#addCategory" href="">
                                    <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                    Export to excel
                                </a>
                            </h4>
                            <table class="table table-borderless table-hover" id="units">
                                <thead>
                                    <tr>
                                        <th class="text-left">
                                            Date
                                        </th>
                                        <th class="text-left">
                                            Uploaded by
                                        </th>
                                        <th class="text-left">
                                            Image
                                        </th>
                                        <th class="text-center">
                                            @lang('crud.common.actions')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $items = DB::select("SELECT * FROM receipts_stock ");
                                    @endphp
                                    @forelse ($items as $itemCategory) <tr>
                                        <td>{{ $itemCategory->Date_rec  ?? '-' }}</td>
                                        <td>{{ $itemCategory->uploadedby  ?? '-' }}</td>
                                        <td>{{ $itemCategory->receipt_image  ?? '-' }}</td>
                                        <td class="text-center" style="width: 134px;">
                                            <div role="group" aria-label="Row Actions" class="btn-group">
                                               @can('view', $itemCategory)
                                                <a href="">
                                                    <button type="button" class="btn btn-sm btn-success ">
                                                        <i class="icon ti-eye"></i> VIEW
                                                    </button>
                                                </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">
                                            @lang('crud.common.no_items_found')
                                        </td>
                                    </tr>
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
</div>
</div>
</div>

@include('partials.footer')
</section>
</div>
@endsection
