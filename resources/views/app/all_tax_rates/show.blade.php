@extends('layouts.appbar')

@section('title', 'DIT Restuarant')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Tax Rate Details</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ route('all-payment-types.index') }}"> Tax Rates</a>
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
                            <!-- edit this user (uses the edit method found at GET /user/{id}/edit -->
                            <a><span class="glyphicon glyphicon-edit"></span>
                                Tax Rates Details:
                             </a>
                             <a class="btn btn-sm btn-info" href="{{ route('all-tax-rates.create') }}">
                                 <span class="glyphicon glyphicon-edit"></span><i class="ti-pencil-alt"></i>
                                 Edit Tax Rates
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
                                        <h3><strong> @lang('crud.all_tax_rates.inputs.tax_name'): </strong>
                                            {{ $taxRates->tax_name ?? '-' }}</h3>
                                        <h3><strong> @lang('crud.all_tax_rates.inputs.rate') </strong>
                                            {{ $taxRates->rate ?? '-' }}</h3>
                                    </div>
                                    <div class="mt-4">
                                        <a
                                            href="{{ route('all-tax-rates.index') }}"
                                            class="btn btn-sm btn-light"
                                        >
                                            <i class="icon ion-md-return-left"></i>
                                            @lang('crud.common.back')
                                        </a>                       
                                
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

    