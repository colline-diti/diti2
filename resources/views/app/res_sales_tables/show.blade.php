@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('res-sales-tables.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.res_sales_tables.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.res_sales_tables.inputs.product_name')</h5>
                    <span>{{ $resSalesTable->product_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.res_sales_tables.inputs.price')</h5>
                    <span>{{ $resSalesTable->price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.res_sales_tables.inputs.res_product_id')
                    </h5>
                    <span
                        >{{ optional($resSalesTable->resProduct)->product_name
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('res-sales-tables.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ResSalesTable::class)
                <a
                    href="{{ route('res-sales-tables.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
