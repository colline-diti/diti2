@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('petty-cashes.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.petty_cashes.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.petty_cashes.inputs.details')</h5>
                    <span>{{ $pettyCash->details ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.petty_cashes.inputs.debit')</h5>
                    <span>{{ $pettyCash->debit ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.petty_cashes.inputs.credit')</h5>
                    <span>{{ $pettyCash->credit ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.petty_cashes.inputs.expeses_resturant_id')
                    </h5>
                    <span
                        >{{ optional($pettyCash->expesesResturant)->particulars
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('petty-cashes.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\PettyCash::class)
                <a
                    href="{{ route('petty-cashes.create') }}"
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
