@extends('layouts.userAppbar')

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
                    <a class="breadcrumb-item" href="{{ route('userDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ route('userDashboard') }}"> Access Control</a>
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
                            <a href="">
                                <div class="card border-success" data-title="Access the Restuarent Dashboard">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-success border-sucess"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text"> User Accounts</div>
                                            <div class="stat-digit">ACCOUNTS</div>
                                        </div>
                                    </div>
                                </div>
                            </a>                        
                        </div>   
                          <div class="col-lg-4">
                            <a href="#">
                                <div class="card border-success">
                                    <div class="stat-widget-one" data-title="Access the Procurement Dashboard">
                                        <div class="stat-icon dib"><i class="ti-truck color-success border-success"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text"> Attendance</div>
                                            <div class="stat-digit">STAFF</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                        </div>                     
                        <div class="col-lg-4">
                            <a href="">
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

