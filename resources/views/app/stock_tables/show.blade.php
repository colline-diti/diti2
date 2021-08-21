@extends('layouts.appbar')

@section('title', 'DIT Restuarant')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>@lang('crud.stock_tables.show_title')</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ route('stock-tables.index') }}"> Stock Items</a>
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
                        <h4 class="card-title">
                            <!-- edit thisItem Category (uses the edit method found at GET /user/{id}/edit -->
                            <a><span class="glyphicon glyphicon-edit"></span>
                               Stock Item  Details:
                             </a>
                             <a class="btn btn-sm btn-info" href="{{ route('stock-tables.edit', $stockTable) }}">
                                 <span class="glyphicon glyphicon-edit"></span><i class="ti-pencil-alt"></i>
                                 Edit Stock Item
                             </a>
                             <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                                Back </span>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <div class="container-fluid">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="display-details">
                                        <h6><strong>@lang('crud.stock_tables.inputs.item_name'): </strong>{{ $stockTable->item_name ?? '-' }}</h4>
                                        <h6><strong>@lang('crud.stock_tables.inputs.quantity'): </strong>{{ $stockTable->quantity ?? '-' }}</h4>                                          
                                        <h6><strong>@lang('crud.stock_tables.inputs.item_category_id'): </strong>{{ optional($stockTable->itemCategory)->name ?? '-'
                                        }}</h4>
                                        <h6><strong>@lang('crud.stock_tables.input.unit_id'): </strong>{{ optional($stockTable->unit)->unit_name ?? '-'
                                        }}</h4>
                                            <h6><strong>@lang('crud.stock_tables.inputs.remarks'): </strong>{{ $stockTable->remarks ?? '-' }}</h4>
                                    </div>
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

    