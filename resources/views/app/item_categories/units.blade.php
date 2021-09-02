@extends('layouts.appbar')

@section('content')
<div class="container-fluid"><br>
    <div class="row">
        <div class="col-lg- 12 p-r-0 title-margin-right">
            <h4 style="margin-bottom: 0.5em;" class="card-title">                
                <!--Put Register link-->
                <a class="btn btn-sm btn-info ml-3" href="{{ route('item-categories.index') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Items
                </a>
                <a class="btn btn-sm btn-info" href="{{ route('item-categories.categories') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Categories
                </a>
                <a class="btn btn-sm btn-success"  href="{{ route('item-categories.units') }}">
                    <span class="glyphicon glyphicon-edit">
                    Units
                </a>
                <a class="btn btn-sm btn-info" href="{{ route('item-categories.departments') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Departments
                </a>
                
            </h4>
           
        </div>
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-success">                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 float-right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 style="margin-bottom: 0.5em;" class="card-title">                                   
                                    <!-- Create new User-->
                                    <a><span class="glyphicon glyphicon-edit"></span>
                                      Item Units
                                    </a>  
                                    <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#addUnits"  href="">
                                        <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                       Add Unit
                                    </a>                                  
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover" id="units">
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                    ID
                                                </th>
                                                <th class="text-left">
                                                    Unit Name
                                                </th>
                                                <th class="text-center">
                                                    @lang('crud.common.actions')
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $items = DB::select("SELECT * FROM unit3");
                                            @endphp
                                            @forelse ($items as $itemCategory) <tr>
                                                <td>{{ $itemCategory->unit_id  ?? '-' }}</td>
                                                <td>{{ $itemCategory->unit_name  ?? '-' }}</td>
                                                <td class="text-center" style="width: 134px;">
                                                    <div role="group" aria-label="Row Actions" class="btn-group">
                                                        @can('update', $itemCategory)
                                                        <a href="">
                                                            <button type="button" class="btn btn-sm btn-light">
                                                                <i class="icon ti-pencil-alt"></i>
                                                            </button>
                                                        </a>
                                                        @endcan  
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2">
                                                    @lang('crud.common.no_items_found')
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    <h4 style="margin-top: 0.5em;" class="card-title">
                                        <!--Put Register link-->
                                    <button style="margin-left: 78%;" class="btn btn-sm btn-danger">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        Export to PDF
                                    </button>
                                    <button class="btn btn-sm btn-success float-right">
                                        <span class="glyphicon glyphicon-edit"></span></i>
                                        Export to excel
                                    </button>
                                    </h4>
                                </div>
                            </div>                    
                       
                    </div>
                </div>
            </div>

        </div>

        <!--Row 2---->
    </div>
</div>
</div>


@include('partials.modals.CategoryAction.addUnits')
@include('partials.footer')
</section>
</div>
@endsection
