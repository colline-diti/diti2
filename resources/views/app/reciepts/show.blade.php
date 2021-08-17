@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('reciepts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.reciepts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.reciepts.inputs.quantity')</h5>
                    <span>{{ $reciept->quantity ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reciepts.inputs.cash')</h5>
                    <span>{{ $reciept->cash ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reciepts.inputs.change')</h5>
                    <span>{{ $reciept->change ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reciepts.inputs.balance')</h5>
                    <span>{{ $reciept->balance ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reciepts.inputs.total')</h5>
                    <span>{{ $reciept->total ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reciepts.inputs.served_by')</h5>
                    <span>{{ $reciept->served_by ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reciepts.inputs.res_product_id')</h5>
                    <span
                        >{{ optional($reciept->resProduct)->product_name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('reciepts.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Reciept::class)
                <a href="{{ route('reciepts.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
