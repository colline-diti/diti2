@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Requisition Items</span></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('requisition-items.index') }}">Requisition Items</a>
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
                                Requisition Items List:
                             </a>
                             <!--Put Register link-->
                             <a class="btn btn-sm btn-info" href="{{ route('requisition-items.create') }}">
                                 <span class="glyphicon glyphicon-edit"></span><i class="ti-plus"></i>
                                 Create Requisition Item
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
                                                        @lang('crud.requisition_items.inputs.name')
                                                    </th>
                                                    <th class="text-left">
                                                        @lang('crud.requisition_items.inputs.restaurant_requisition_id')
                                                    </th>
                                                    <th class="text-center">
                                                        @lang('crud.common.actions')
                                                    </th>
                                                </tr>
                                            </thead>
                                            @forelse($requisitionItems as $requisitionItem)
                                    <tr>
                                        <td>{{ $requisitionItem->name ?? '-' }}</td>
                                        <td>
                                            {{
                                            optional($requisitionItem->restaurantRequisition)->requisition_code
                                            ?? '-' }}
                                        </td>
                                        <td class="text-center" style="width: 134px;">
                                            <div
                                                role="group"
                                                aria-label="Row Actions"
                                                class="btn-group"
                                            >
                                                @can('update', $requisitionItem)
                                                <a
                                                    href="{{ route('requisition-items.edit', $requisitionItem) }}"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-light"
                                                    >
                                                        <i class="icon ti-pencil-alt"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('view', $requisitionItem)
                                                <a
                                                    href="{{ route('requisition-items.show', $requisitionItem) }}"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-light text-sucess"
                                                    >
                                                        <i class="icon ti-eye"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $requisitionItem)
                                                <form
                                                    action="{{ route('requisition-items.destroy', $requisitionItem) }}"
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
                                        <td colspan="3">
                                            {!! $requisitionItems->render() !!}
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

