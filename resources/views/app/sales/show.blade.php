@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('sales.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.sales.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.sales.inputs.product_name')</h5>
                    <span>{{ $sale->product_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sales.inputs.unit_price')</h5>
                    <span>{{ $sale->unit_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sales.inputs.total_price')</h5>
                    <span>{{ $sale->total_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sales.inputs.discounts')</h5>
                    <span>{{ $sale->discounts ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sales.inputs.clients_id')</h5>
                    <span>{{ optional($sale->clients)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sales.inputs.payment_types_id')</h5>
                    <span
                        >{{ optional($sale->paymentTypes)->payment_name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('sales.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Sale::class)
                <a href="{{ route('sales.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
