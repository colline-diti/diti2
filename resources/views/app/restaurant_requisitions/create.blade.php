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
                @lang('crud.restaurant_requisitions.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('restaurant-requisitions.store') }}"
                class="mt-4"
            >
                @include('app.restaurant_requisitions.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('restaurant-requisitions.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.create')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
