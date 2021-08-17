@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('expeses-resturants.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.expeses_resturants.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.expeses_resturants.inputs.particulars')</h5>
                    <span>{{ $expesesResturant->particulars ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expeses_resturants.inputs.quantity')</h5>
                    <span>{{ $expesesResturant->quantity ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expeses_resturants.inputs.rate')</h5>
                    <span>{{ $expesesResturant->rate ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expeses_resturants.inputs.ammount')</h5>
                    <span>{{ $expesesResturant->ammount ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('expeses-resturants.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Expeses_Resturant::class)
                <a
                    href="{{ route('expeses-resturants.create') }}"
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
