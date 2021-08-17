@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-assets-accounts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_assets_accounts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_assets_accounts.inputs.asset_name')</h5>
                    <span>{{ $assetsAccounts->asset_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_assets_accounts.inputs.quantity')</h5>
                    <span>{{ $assetsAccounts->quantity ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_assets_accounts.inputs.supplier')</h5>
                    <span>{{ $assetsAccounts->supplier ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_assets_accounts.inputs.price')</h5>
                    <span>{{ $assetsAccounts->price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_assets_accounts.inputs.asset_types_id')
                    </h5>
                    <span
                        >{{ optional($assetsAccounts->assetTypes)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-assets-accounts.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\AssetsAccounts::class)
                <a
                    href="{{ route('all-assets-accounts.create') }}"
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
