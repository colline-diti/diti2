@extends('layouts.appbar')

@section('content')
<div class="container-fluid"><br>
    <div class="row">
        <div class="col-lg- 12 p-r-0 title-margin-right">
            <h4 style="margin-bottom: 0.5em;" class="card-title">                
                <!--Put Register link-->
                <a class="btn btn-sm btn-info ml-3"  href="{{ route('item-categories.index') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Items
                </a>
                <a class="btn btn-sm btn-success ml-1" href="{{ route('item-categories.categories') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Categories
                </a>
                <a class="btn btn-sm btn-info ml-1"  href="{{ route('item-categories.units') }}">
                    <span class="glyphicon glyphicon-edit"></span> 
                    Units
                </a>
                <a class="btn btn-sm btn-info ml-1"  href="{{ route('item-categories.departments') }}">
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
                            <div class="table-responsive">
                                <h4 style="margin-bottom: 0.5em;" class="card-title">                                   
                                    <!-- Create new User-->
                                    <a><span class="glyphicon glyphicon-edit"></span>
                                        Item Categories
                                    </a>  
                                    <a class="btn btn-sm btn-success"data-toggle="modal" data-target="#addCategory" href="">
                                        <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                       Add Category
                                    </a>                                  
                                </h4>
                                <table class="table table-border table-hover" id="categories">
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                NO.
                                            </th>
                                            <th class="text-left">
                                                Category Name
                                            </th>
                                            <th class="text-center">
                                                @lang('crud.common.actions')
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $items = DB::select("SELECT * FROM category3");
                                        @endphp
                                        @forelse ($items as $itemCategory) <tr>
                                            <td>{{ $itemCategory->category_id  ?? '-' }}</td>
                                            <td>{{ $itemCategory->category_name  ?? '-' }}</td>
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
                                    </tbody>                                    
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                
                                            </td>
                                        </tr>
                                    </tfoot>
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

        <!--Row 2---->
    </div>
</div>
</div>



@include('partials.modals.CategoryAction.addCategory')
@include('partials.footer')
</section>
</div>
@endsection
