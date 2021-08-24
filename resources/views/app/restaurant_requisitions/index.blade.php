@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Requisition Order</span></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('restaurant-requisitions.index') }}"> Requisition Orders</a>
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
                              <!-- Create new User-->
                              <a><span class="glyphicon glyphicon-edit"></span>
                                Requisition Orders List:
                             </a>
                             <!--Put Register link-->
                            <a class="btn btn-sm btn-info" href="{{ route('restaurant-requisitions.create') }}">
                                 <span class="glyphicon glyphicon-edit"></span><i class="ti-plus"></i>
                                 Create Requisition Order
                             </a>
                             <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                              Back </span>
                             </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div  class="col-md-6 float-right">
                                <form>
                                    <div class="input-group">
                                        <input
                                            id="indexSearch"
                                            type="text"
                                            name="search"
                                            placeholder="{{ __('crud.common.search') }}"
                                            value="{{ $search ?? '' }}"
                                            class="form-control"
                                            autocomplete="off"
                                        />
                                        <div class="input-group-append">
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                <i class="icon ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-left">
                                            @lang('crud.restaurant_requisitions.inputs.requisition_code')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.restaurant_requisitions.inputs.Particulars')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.restaurant_requisitions.inputs.delivery_status')
                                        </th>
                                        <th class="text-center">
                                            @lang('crud.common.actions')
                                        </th>
                                        <th class="text-right">
                                            @lang('crud.restaurant_requisitions.inputs.status')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($restaurantRequisitions as $restaurantRequisition)
                                    <tr>
                                        <td>
                                            {{ $restaurantRequisition->requisition_code ?? '-' }}
                                        </td>
                                        
                                        <td>
                                            {{ $restaurantRequisition->Particulars ?? '-' }}
                                        </td>
                                        <td><span class="badge badge-warning">{{ $restaurantRequisition->delivery_status ?? '-' }}</span></td>
                                        <td class="text-center" style="width: 134px;">
                                            <div
                                                role="group"
                                                aria-label="Row Actions"
                                                class="btn-group"
                                            >
                                                @can('update', $restaurantRequisition)
                                                <a
                                                    href="{{ route('restaurant-requisitions.edit', $restaurantRequisition) }}"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn  btn-sm btn-light"
                                                    >
                                                        <i class="icon ti-pencil-alt"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('view', $restaurantRequisition)
                                                <a
                                                    href="{{ route('restaurant-requisitions.show', $restaurantRequisition) }}"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-light text-success"
                                                    >
                                                        <i class="icon ti-eye"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $restaurantRequisition)
                                                <form
                                                    action="{{ route('restaurant-requisitions.destroy', $restaurantRequisition) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                                >
                                                    @csrf @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-light text-danger"
                                                    >
                                                        <i class="icon ti-trash"></i>
                                                    </button>
                                                </form>
                                                @endcan
                                            </div>
                                        </td>                                       
                                        <td><span class="badge badge-danger">{{ $restaurantRequisition->status ?? '-' }}</span></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">
                                            @lang('crud.common.no_items_found')
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            {!! $restaurantRequisitions->render() !!}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                  
                    </div>   
                </div>
            </div>    
        </div> 
  
        @include('partials.footer') 
    </section>
  </div>
@endsection

