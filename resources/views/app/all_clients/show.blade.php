@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-clients.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_clients.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_clients.inputs.name')</h5>
                    <span>{{ $clients->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_clients.inputs.contact')</h5>
                    <span>{{ $clients->contact ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_clients.inputs.email')</h5>
                    <span>{{ $clients->email ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-clients.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Clients::class)
                <a
                    href="{{ route('all-clients.create') }}"
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
