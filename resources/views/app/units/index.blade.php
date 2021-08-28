@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Measure Unit Settings</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('res-sections.index') }}"> Departments</a>
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
                                @lang('crud.res_sections.index_title'):
                             </a>
                             <!--Put Register link-->
                             <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addDepartment" href="">
                                 <span class="glyphicon glyphicon-edit"></span><i class="ti-plus"></i>
                                Add Department
                             </a>
                             <a class="btn btn-sm btn-info ml-4" data-toggle="modal" data-target="#addSaloonOrder" href="">
                                <span class="glyphicon glyphicon-edit"></span><i class="ti-plus"></i>
                                Add Measure Unit
                            </a>
                             <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                              Back </span>
                             </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div  class="col-md-6 float-right">
                                <form class="form-control-label">
                                    <div class="input-group">
                                        <input class="form-control-label col-md-6"  
                                            id="indexSearch"
                                            type="text"
                                            name="search"
                                            placeholder="{{ __('crud.common.search') }}"
                                            value="{{ $search ?? '' }}"
                                            class="form-control"
                                            autocomplete="off"
                                        />
                                        <div class="form-control-label input-group-append">
                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-primary"
                                            >
                                                <i class="icon ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                    

                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                    @lang('crud.units.inputs.unit_name')
                                                </th>                                               
                                                <th class="text-center">
                                                    @lang('crud.common.actions')
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($units as $unit)
                                            <tr>
                                                <td>{{ $unit->unit_name ?? '-' }}</td>                                               
                                                <td class="text-center" style="width: 134px;">
                                                    <div
                                                        role="group"
                                                        aria-label="Row Actions"
                                                        class="btn-group"
                                                    >
                                                        @can('update', $unit)
                                                        <a href="{{ route('units.edit', $unit) }}">
                                                            <button
                                                                type="button"
                                                                class="btn btn-sm btn-light"
                                                            >
                                                                <i class="icon ti-pencil-alt"></i>
                                                            </button>
                                                        </a>
                                                        @endcan @can('view', $unit)
                                                        <a href="{{ route('units.show', $unit) }}">
                                                            <button
                                                                type="button"
                                                                class="btn btn-sm btn-light text-success"
                                                            >
                                                                <i class="icon ti-eye"></i>
                                                            </button>
                                                        </a>
                                                        @endcan @can('delete', $unit)
                                                        <form
                                                            action="{{ route('units.destroy', $unit) }}"
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
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3">
                                                    @lang('crud.common.no_items_found')
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3">{!! $units->render() !!}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>                       
                    </div>   
                </div>
            </div>    
        </div> 

        @include('partials.modals.addSaloonOrder') 
        @include('partials.modals.addDepartment') 
        @include('partials.footer') 
    </section>
  </div>
@endsection