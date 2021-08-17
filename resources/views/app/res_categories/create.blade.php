@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Create Category</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ URL::route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ URL::route('res-categories.create') }}"> Product Categories</a>
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
                                Add Category:
                             </a>
                             <a class="btn btn-sm btn-info" href="#" >
                                <span class="glyphicon glyphicon-edit"></span><i class="ti-plus"></i>
                                Create Product Category
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
                                                action="{{ route('res-categories.store') }}"
                                                class="mt-4"
                                            >
                                                @include('app.res_categories.form-inputs')

                                                <div class="mt-4">
                                                    
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
