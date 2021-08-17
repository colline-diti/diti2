@extends('layouts.appbar')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('res-products.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.product_details.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.product_details.inputs.product_name')</h5>
                    <span>{{ $resProduct->product_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.product_details.inputs.category')</h5>
                    <span>{{ $resProduct->category ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.product_details.inputs.res_category_id')
                    </h5>
                    <span
                        >{{ optional($resProduct->resCategory)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('res-products.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ResProduct::class)
                <a
                    href="{{ route('res-products.create') }}"
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
