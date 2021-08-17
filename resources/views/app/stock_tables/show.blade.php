@extends('layouts.appbar')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('stock-tables.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.stock_tables.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.stock_tables.inputs.item_name')</h5>
                    <span>{{ $stockTable->item_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stock_tables.inputs.unit')</h5>
                    <span>{{ $stockTable->unit ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stock_tables.inputs.category')</h5>
                    <span>{{ $stockTable->category ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stock_tables.inputs.buying_price')</h5>
                    <span>{{ $stockTable->buying_price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stock_tables.inputs.quantity')</h5>
                    <span>{{ $stockTable->quantity ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.stock_tables.inputs.description')</h5>
                    <span>{{ $stockTable->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('stock-tables.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\StockTable::class)
                <a
                    href="{{ route('stock-tables.create') }}"
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
