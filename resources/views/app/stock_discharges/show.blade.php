@extends('layouts.appbar')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">                
                <div class="col-md-6">
                    <div class="user-photo m-b-30">
                        <img height="150px" class="img-fluid" src="/assets/images/invoice.jpg" alt="Invoice Image" />
                    </div>
                </div>                
                <div class="col-md-2">
                    
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                        <thead class="thead-light">
                            <tr>
                                <tr>
                                    <th class="text-right">
                                        @lang('crud.stock_discharges.inputs.quantity_issued')
                                    </th>
                                    <th class="text-left">
                                        @lang('crud.stock_discharges.inputs.section')
                                    </th>
                                    <th class="text-left">
                                        @lang('crud.stock_discharges.inputs.stock_table_id')
                                    </th>
                                    <th class="text-left">
                                        @lang('crud.stock_discharges.inputs.res_section_id')
                                    </th>
                                    <th class="text-left">
                                        @lang('crud.stock_discharges.inputs.description')
                                    </th>
                                    <th class="text-left">
                                        @lang('crud.stock_discharges.inputs.issued_by')
                                    </th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>                                  
                        <tr>
                            <td><span>{{ $stockDischarge->quantity_issued ?? '-' }}</span></td>
                            <td><span>{{ $stockDischarge->section ?? '-' }}</span></td>
                            <td><span
                                >{{ optional($stockDischarge->stockTable)->item_name ??
                                '-' }}</span
                            ></td>                                        
                            <td>  <span
                                >{{ optional($stockDischarge->resSection)->section_name
                                ?? '-' }}</span
                            ></td>                                        
                            <td><span>{{ $stockDischarge->description ?? '-' }}</span></td>
                            <td><span>{{ $stockDischarge->issued_by ?? '-' }}</span></td>                                       
                            
                        </tr>    
                    </tbody>
                </table>
                <div class="row">
                    <a
                        href="{{ route('stock-discharges.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>                    
                </div>
        </div>
    </div>
</div>
@endsection
