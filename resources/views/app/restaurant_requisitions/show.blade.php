@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('restaurant-requisitions.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.restaurant_requisitions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.restaurant_requisitions.inputs.item_name')
                    </h5>
                    <span>{{ $restaurantRequisition->item_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.restaurant_requisitions.inputs.quantity')
                    </h5>
                    <span>{{ $restaurantRequisition->quantity ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.restaurant_requisitions.inputs.dateofDelivery')
                    </h5>
                    <span
                        >{{ $restaurantRequisition->dateofDelivery ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.restaurant_requisitions.inputs.status')</h5>
                    <span>{{ $restaurantRequisition->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.restaurant_requisitions.inputs.Particulars')
                    </h5>
                    <span
                        >{{ $restaurantRequisition->Particulars ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('restaurant-requisitions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\RestaurantRequisition::class)
                <a
                    href="{{ route('restaurant-requisitions.create') }}"
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
