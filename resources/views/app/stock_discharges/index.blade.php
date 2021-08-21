@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>{{  request()->route()->uri }}</span></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                        <a class="breadcrumb-item" href="{{ route('stock-tables.index') }}"> Stock Management</a>
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
                                Stock Discharge List:
                             </a>
                             <!--Put Register link-->
                             <a class="btn btn-sm btn-info" href="{{ route('stock-discharges.create') }}">
                                 <span class="glyphicon glyphicon-edit"></span>
                                 Create Discharge
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
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-left">
                                            @lang('crud.stock_discharges.inputs.quantity_issued')
                                        </th>                                      
                                        <th class="text-left">
                                            @lang('crud.stock_discharges.inputs.stock_table_id')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.stock_discharges.inputs.unit_id')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.stock_discharges.inputs.res_section_id')
                                        </th>   
                                        <th class="text-left">
                                            @lang('crud.stock_discharges.inputs.return_date')
                                        </th>                                    
                                        <th class="text-left">
                                            @lang('crud.stock_discharges.inputs.remarks')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.stock_discharges.inputs.issued_by')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.stock_discharges.inputs.user_id')
                                        </th>
                                        <th class="text-center">
                                            @lang('crud.common.actions')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($stockDischarges as $stockDischarge)
                                    <tr>
                                        <td>
                                            {{ $stockDischarge->quantity_issued ?? '-' }}
                                        </td>                                      
                                        <td>
                                            {{
                                            optional($stockDischarge->stockTable)->item_name
                                            ?? '-' }}
                                        </td>
                                        <td>
                                            {{ optional($stockDischarge->unit)->unit_name ??
                                                '-' }}
                                        </td>                                      
                                        <td>
                                            {{
                                            optional($stockDischarge->resSection)->section_name
                                            ?? '-' }}
                                        </td>  
                                        <td>{{ $stockDischarge->return_date ?? '-' }}</td>                                   
                                        <td>{{ $stockDischarge->remarks ?? '-' }}</td>
                                        <td>{{ $stockDischarge->issued_by ?? '-' }}</td>
                                        <td>{{ optional($stockDischarge->user)->name ?? '-'
                                        }}</td>
                                        <td class="text-center" style="width: 134px;">
                                            <div
                                                role="group"
                                                aria-label="Row Actions"
                                                class="btn-group"
                                            >
                                                @can('update', $stockDischarge)
                                                <a
                                                    href="{{ route('stock-discharges.edit', $stockDischarge) }}"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-light"
                                                    >
                                                        <i class="icon ti-pencil-alt"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('view', $stockDischarge)
                                                <a
                                                    href="{{ route('stock-discharges.show', $stockDischarge) }}"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-light text-success"
                                                    >
                                                        <i class="icon ti-eye"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $stockDischarge)
                                                <form
                                                    action="{{ route('stock-discharges.destroy', $stockDischarge) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                                >
                                                    @csrf @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="btn btn-light text-danger"
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
                                        <td colspan="7">
                                            @lang('crud.common.no_items_found')
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            {!! $stockDischarges->render() !!}
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

