@extends('layouts.app2')

@section('content')
@include('partials.navbardash')
<div class="container-fluid">  
    <!-- /# navbar-->
    <div class="card border-success">
        <div class="card-body">
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-3" >
                        <a href="{{route('cafeDashboard') }}">
                            <div class="card border-success" data-title="Access the Restuarent Dashboard">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-panel color-success border-sucess"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"> DIT Restuarant</div>
                                        <div class="stat-digit">CAFE</div>
                                    </div>
                                </div>
                            </div>
                        </a>                        
                    </div>
                    <div class="col-lg-3">
                        <a href="#">
                            <div class="card border-success" data-title="Access the Accounts Dashboard">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"> General Accounts</div>
                                        <div class="stat-digit">ACCOUNTS</div>
                                    </div>
                                </div>
                            </div></a>
                        
                    </div>
                    <div class="col-lg-3">
                        <a href="#">
                            <div class="card border-success">
                                <div class="stat-widget-one" data-title="Access the Procurement Dashboard">
                                    <div class="stat-icon dib"><i class="ti-truck color-success border-success"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">General Procurement</div>
                                        <div class="stat-digit">PURCHASE</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="#">
                            <div class="card border-success" data-title="Access the Saloon Dashboard">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-crown color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">DIT Saloon</div>
                                        <div class="stat-digit">SALOON</div>
                                    </div>
                                </div>
                            </div>
                        </a>                        
                    </div> 
                </div>
                <div class="row">                                                     
                    <div class="col-lg-3">
                        <a href="{{route('userDashboard') }}">
                            <div class="card border-success" data-title="User Access Control Dashboard">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">System Configurations</div>
                                        <div class="stat-digit">SETTINGS</div>
                                    </div>
                                </div>
                            </div>
                        </a>                        
                    </div>
                </div>
                <style>
                    .img-container {
                      text-align: center;
                    }

                  </style>
                <div  class="row">
                    <div class="col-md-12">
                        <div  class="img-container">
                            <a class="col-md-4 col-md-offset-4" href=""><img width = "150px" height="150px" src="/assets/images/logo1.jpg" alt="DIT Restuarant"></a>
                            <h6 style="margin-top: 0.5em;">Copyright © 2021 - <a href="{{ route('home') }}">DIT Business Incubation Center</h6></p>
                        </div> 
                    </div>
                </div>
            </section>
        </div>
      </div>
@endsection
