@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>@lang('crud.res_sections.name')</h1>
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
                             <a class="btn btn-sm btn-info" href="{{ route('res-sections.create') }}">
                                 <span class="glyphicon glyphicon-edit"></span><i class="ti-plus"></i>
                                 @lang('crud.res_sections.create_title')
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
                    
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th class="text-left">
                                            @lang('crud.res_sections.inputs.section_name')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.res_sections.inputs.description')
                                        </th> 
                                        <th class="text-center">
                                            @lang('crud.common.actions')
                                        </th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($resSections as $resSection)
                                    <tr>
                                        <td>{{ $resSection->section_name ?? '-' }}</td>
                                        <td>{{ $resSection->description ?? '-' }}</td>
                                        <td class="text-center" style="width: 134px;">
                                            <div
                                                role="group"
                                                aria-label="Row Actions"
                                                class="btn-group"
                                            >
                                                @can('update', $resSection)
                                                <a
                                                    href="{{ route('res-sections.edit', $resSection) }}"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-light"
                                                    >
                                                        <i class="icon ti-pencil-alt"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('view', $resSection)
                                                <a
                                                    href="{{ route('res-sections.show', $resSection) }}"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-light text-success"
                                                    >
                                                        <i class="icon ti-eye"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $resSection)
                                                <form
                                                    action="{{ route('res-sections.destroy', $resSection) }}"
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
                                        <td colspan="4">
                                            @lang('crud.common.no_items_found')
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">{!! $resSections->render() !!}</td>
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

