@extends('layouts.userAppbar')

@section('title', 'DIT Restuarant')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>@lang('crud.users.show_title')</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ route('users.index') }}"> Users</a>
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
                                User Account Details:
                             </a>
                             <a class="btn btn-sm btn-info" href="{{ route('users.edit', $user) }}">
                                 <span class="glyphicon glyphicon-edit"></span><i class="ti-pencil-alt"></i>
                                 Edit User Account
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
                                    <h5>@lang('crud.users.inputs.name')</h5>
                                    <span>{{ $user->name ?? '-' }}</span>
                                </div>
                                <div class="mb-4">
                                    <h5>@lang('crud.users.inputs.email')</h5>
                                    <span>{{ $user->email ?? '-' }}</span>
                                </div>
                            </div>
                
                            <div class="mt-4">
                                <div class="mb-4">
                                    <h5>@lang('crud.roles.name')</h5>
                                    <div>
                                        @forelse ($user->roles as $role)
                                        <div class="badge badge-primary">{{ $role->name }}</div>
                                        <br />
                                        @empty - @endforelse
                                    </div>
                                </div>
                            </div>
                
                            <div class="mt-4">
                                <a href="{{ route('users.index') }}" class="btn btn-light">
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

        

