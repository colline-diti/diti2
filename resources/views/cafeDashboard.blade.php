@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>My Dashboard</span></h1>
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
            <div class="col-lg-12">
                <div class="card border-success">
                    <div class="row">
                        <div class="col-lg-4" >
                            <a href="{{route('reciepts.index') }}">
                                <div class="card border-success" data-title="Access the Restuarent Dashboard">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-panel color-success border-sucess"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text"> Sales Point</div>
                                            <div class="stat-digit">POS</div>
                                        </div>
                                    </div>
                                </div>
                            </a>                        
                        </div>
                        <div class="col-lg-4">
                            <a href="{{ route('stock-tables.index') }}">
                                <div class="card border-success" data-title="Access the Inventory Dashboard">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-shopping-cart color-success border-success"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text"> Iventory Management</div>
                                            <div class="stat-digit">STORE</div>
                                        </div>
                                    </div>
                                </div>
                            </a>                        
                        </div>
                        <div class="col-lg-4">
                            <a href="{{ route('res-products.dailyLogs') }}">
                                <div class="card border-success" data-title="Access the Accounts Dashboard">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-layout color-success border-success"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text"> Reports Managment</div>
                                            <div class="stat-digit">Reports</div>
                                        </div>
                                    </div>
                                </div></a>                            
                        </div>                       
                    </div>
        
    </section>
</div>

@include('partials.footer') 
@endsection

