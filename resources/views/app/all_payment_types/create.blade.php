@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Create Payment Type</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ URL::route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ URL::route('all-payment-types.create') }}"> Payment Types</a>
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
            
                             <!-- Create new Role-->
                             <a><span class="glyphicon glyphicon-edit"></span>
                                Add Payment Type:
                             </a>
                             
                            <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                                Back </span>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="card border-success">
                                <div class="card-body">
                                    <div  style="margin: auto;"  class="col-lg-12">
                                        <x-form
                                                method="POST"
                                                action="{{ route('all-payment-types.store') }}"
                                                class="mt-4"
                                            >
                                                @include('app.all_payment_types.form-inputs')

                                                <div class="mt-4">
                                                    <a
                                                        href="{{ route('all-tax-rates.index') }}"
                                                        class="btn btn-sm btn-light"
                                                    >                                                   
                                                        @lang('crud.common.back')
                                                    </a>  

                                                    <button type="submit" class="btn btn-sm btn-primary float-right">
                                                        <i class="icon ti-save"></i>
                                                        @lang('crud.common.create')
                                                    </button>
                                                </div>
                                            </x-form>
                                    </div>                              
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->

                    </div>   
                </div>
            </div>    
        </div>
        
        @include('partials.footer') 
    </section>
</div>
@endsection
