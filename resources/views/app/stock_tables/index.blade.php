@extends('layouts.appbar')

@section('content')

<script>            
    function formatRows(main, prefer, common) {
        return '<tr><td class="col-xs-2"><input type="text" value="' +main+ '" class="form-control editable" /></td>' +
                '<td class="col-xs-4"><input type="text" value="' +prefer+ '" class="form-control editable" /></td>' +
                '<td class="col-xs-3"><input type="text" value="' +common+ '" class="form-control editable" /></td>' +                    
                '<td class="col-xs-1 text-center"><a href="#" onClick="deleteRow(this)">' +
                '<i class="fa fa-trash-o" aria-hidden="true"></a></td></tr>';
        };

        function deleteRow(trash) {
        $(trash).closest('tr').remove();
        };

        function addRow() {
        var main = $('.addMain').val();
        var preferred = $('.addPrefer').val();
        var common = $('.addCommon').val();
        $(formatRows(main,preferred,common)).insertAfter('#addRow');
        $(input).val('');  
        }

        $('.addBtn').click(function()  {
        addRow();
    });
</script>

<div class="container-fluid"><br>
    <div class="row">
        <div class="col-lg- 12 p-r-0 title-margin-right">
            <h4 style="margin-bottom: 0.5em;" class="card-title">                
                <!--Put Register link-->
                <a class="btn btn-sm btn-success ml-3" href="{{ route('stock-tables.index') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Stock
                </a>
                <a class="btn btn-sm btn-info ml-1"  href="{{ route('item-categories.categories') }}">
                    <span class="glyphicon glyphicon-edit"></span>
                    Discharge Stock
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
                                        Available Stock
                                    </a>  
                                    <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#addStock" href="">
                                        <span class="glyphicon glyphicon-edit"></span> <i class="ti-plus"></i>
                                       Add Stock
                                    </a>                                  
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-border table-hover" id="items">
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                    NO
                                                </th>
                                                <th class="text-left">
                                                    Name
                                                </th>
                                                <th class="text-left">
                                                    Category
                                                </th>
                                                <th class="text-center">
                                                    @lang('crud.common.actions')
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $items = DB::select("select * from items i ,category3 c WHERE i.category_id=c.category_id");
                                            @endphp
                                            @forelse ($items as $itemCategory) <tr>
                                                <td>{{ $itemCategory->item_id  ?? '-' }}</td>
                                                <td>{{ $itemCategory->item_name  ?? '-' }}</td>
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

        </div>

        <!--Row 2---->
    </div>
</div>
</div>


@include('partials.modals.stockAction.addStock')
@include('partials.footer')
</section>
</div>
@endsection
