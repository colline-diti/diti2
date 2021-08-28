@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-8 p-r-0 title-margin-right">
          <div class="page-header">
              <div class="page-title">
                  <h1>Payment Tyes</h1>
              </div>
          </div>
      </div>
      <!-- /# column -->
      <div class="col-lg-4 p-l-0 title-margin-left">
          <div class="page-header">
              <div class="page-title">
                  <ol class="breadcrumb">
                      <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                      <a class="breadcrumb-item" href="{{ route('all-payment-types.index') }}"> Payment types</a>
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
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Payment types</span></a> </li>
                        <div style="margin-left: 80%;" class="card-title">
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
                                            <a href="{{ route('all-payment-types.create') }}">
                                                <button class="btn btn-sm btn-primary" type="button"> <i class="ti-plus"></i> Create Payment Types</button>
                                            </a>
                                        </div>
                                    <!-- End Buttons-->
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th class="text-left">@lang('crud.all_payment_types.inputs.payment_name')</th>
                                                    <th class="text-left">@lang('crud.all_payment_types.inputs.description')</th>                                                
                                                    <th class="text-center">@lang('crud.common.actions')</th>                                                                          
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($allPaymentTypes as $paymentTypes)
                                                <tr>
                                                    <td>{{ $paymentTypes->payment_name ?? '-' }}</td>
                                                    <td>{{ $paymentTypes->description ?? '-' }}</td>
                                                    <td class="text-center" style="width: 134px;">
                                                        <div
                                                            role="group"
                                                            aria-label="Row Actions"
                                                            class="btn-group"
                                                        >
                                                            @can('update', $paymentTypes)
                                                            <a
                                                                href="{{ route('all-payment-types.edit', $paymentTypes) }}"
                                                            >
                                                                <button
                                                                    type="button"
                                                                    class="btn btn-sm btn-light"
                                                                >
                                                                    <i class="icon ti-pencil-alt"></i>
                                                                </button>
                                                            </a>
                                                            @endcan @can('view', $paymentTypes)
                                                            <a
                                                                href="{{ route('all-payment-types.show', $paymentTypes) }}"
                                                            >
                                                                <button
                                                                    type="button"
                                                                    class="btn  btn-sm  btn-light text-success"
                                                                >
                                                                    <i class="icon ti-eye"></i>
                                                                </button>
                                                            </a>
                                                            @endcan @can('delete', $paymentTypes)
                                                            <form
                                                                action="{{ route('all-payment-types.destroy', $paymentTypes) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                                            >
                                                                @csrf @method('DELETE')
                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-light  btn-sm text-danger"
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
                                                        {!! $allPaymentTypes->render() !!}
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
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
