@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-8 p-r-0 title-margin-right">
          <div class="page-header">
              <div class="page-title">
                  <h1>Tax Rates</h1>
              </div>
          </div>
      </div>
      <!-- /# column -->
      <div class="col-lg-4 p-l-0 title-margin-left">
          <div class="page-header">
              <div class="page-title">
                  <ol class="breadcrumb">
                      <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                      <a class="breadcrumb-item" href=""> Settings</a>
                  </ol>
              </div>
          </div>
      </div>
      <!-- /# column -->
  </div>
  <!-- /# row -->
  <section id="main-content">
    <div class="row">                               
        <div class="col-md-12">
            <div class="card border-success">
                <div class="card-body">
                          <!-- Nav tabs -->
                    <ul class="nav nav-tabs border-success " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Tax Rates</span></a> </li>
                        <div style="margin-left: 82%;" class="card-title">
                            <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                                Back </span>
                            </a>
                         </div>
                    </ul>              
                    <!-- Tab panes -->
                    <div class="tab-content  tabcontent-border">
                        <div class="tab-pane  active" id="home" role="tabpanel">
                            <div class="p-20">
                                <div class="col-lg-12">
                                    <!--Buttons-->
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">                        
                                            <a href="{{ route('all-tax-rates.create') }}">
                                                <button class="btn btn-sm btn-primary" type="button"> <i class="ti-plus"></i> Create Tax Rate</button>
                                            </a>
                                        </div>
                                    <!-- End Buttons-->
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>@lang('crud.all_tax_rates.inputs.tax_name')</th>
                                                    <th>@lang('crud.all_tax_rates.inputs.rate')</th>                                                
                                                    <th>@lang('crud.common.actions')</th>                                                                          
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($allTaxRates as $taxRates)
                                                <tr>
                                                    <td>{{ $taxRates->tax_name ?? '-' }}</td>
                                                    <td>{{ $taxRates->rate ?? '-' }}</td>
                                                    <td class="text-center" style="width: 134px;">
                                                        <div
                                                            role="group"
                                                            aria-label="Row Actions"
                                                            class="btn-group"
                                                        >
                                                            @can('update', $taxRates)
                                                            <a
                                                                href="{{ route('all-tax-rates.edit', $taxRates) }}"
                                                            >
                                                                <button
                                                                    type="button"
                                                                    class="btn btn-sm btn-light"
                                                                >
                                                                    <i class="icon ti-pencil-alt"></i>
                                                                </button>
                                                            </a>
                                                            @endcan @can('view', $taxRates)
                                                            <a
                                                                href="{{ route('all-tax-rates.show', $taxRates) }}"
                                                            >
                                                                <button
                                                                    type="button"
                                                                    class="btn btn-sm btn-light text-success"
                                                                >
                                                                    <i class="icon ti-eye"></i>
                                                                </button>
                                                            </a>
                                                            @endcan @can('delete', $taxRates)
                                                            <form
                                                                action="{{ route('all-tax-rates.destroy', $taxRates) }}"
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
                                                    <td colspan="3">{!! $allTaxRates->render() !!}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
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
