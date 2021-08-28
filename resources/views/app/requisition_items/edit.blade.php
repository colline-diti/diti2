@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Add Requisition Items</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ URL::route('cafeDashboard') }}"> Dashboard</a>
                    <a class="breadcrumb-item" href="{{ URL::route('restaurant-requisitions.create') }}"> Requisition Order</a>
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
                                    @php
                                        $restaursnt_requisitions= DB::select('SELECT requisition_code FROM restaurant_requisitions');
                                    @endphp
                             <!-- Create new Role-->
                             <a><span class="glyphicon glyphicon-edit"></span>
                                Requisition Code: RO.{{ $restaurantRequisition->requisition_code ?? '-' }}
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
                                            action="{{ route('requisition-items.store') }}"
                                            class="mt-4"
                                        >
                                            @include('app.requisition_items.form-inputs')
                            
                                            <div class="mt-4">
                                                <a
                                                    href="{{ route('requisition-items.index') }}"
                                                    class="btn btn-sm btn-light"
                                                >
                                                    <i class="icon ion-md-return-left text-primary"></i>
                                                    View Added Items
                                                </a>
                            
                                                <button type="submit" class="btn btn-sm btn-primary float-right">
                                                    <i class="icon ti-save"></i>
                                                    @lang('crud.common.update')
                                                </button>
                                            </div>
                                        </x-form>
                                    </div>   
                                    <div class="row">
                                        <div class="card border-success">
                                            <div class="card-body">
                                                @can('view-any', App\Models\RequisitionDelivery::class)
                                                    <div class="card mt-4">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Requisition Deliveries</h4>
                                        
                                                            <livewire:requisition-item-requisition-deliveries-detail
                                                                :requisitionItem="$requisitionItem"
                                                            />
                                                        </div>
                                                    </div>
                                                @endcan
                                            </div>
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
