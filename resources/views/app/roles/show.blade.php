@extends('layouts.userAppbar')

@section('title', 'DIT Restuarant')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>@lang('crud.roles.show_title')</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ route('res-sections.index') }}"> Restaurant Sections</a>
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
                                User Role Details:
                             </a>
                             <a class="btn btn-sm btn-info" href="{{ route('users.edit', $role) }}">
                                 <span class="glyphicon glyphicon-edit"></span><i class="ti-pencil-alt"></i>
                                 Edit User Role
                             </a>
                             <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                                Back </span>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">                          
                
                            <div class="mt-4">
                                <div class="mb-4">
                                    <h5>@lang('crud.roles.inputs.name')</h5>
                                    <span>{{ $role->name ?? '-' }}</span>
                                </div>
                            </div>
                
                            <div class="mt-4">
                                <a href="{{ route('roles.index') }}" class="btn btn-light">
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

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

        


