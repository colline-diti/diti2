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
                                    <th class="text-left">
                                        @lang('crud.res_sections.inputs.section_name')
                                    </th>                                    
                                </tr>                        
                        </thead>
                    <tbody>                                  
                        <tr>
                            <td>{{ $resSection->section_name ?? '-' }}</td>                   
                        </tr>    
                    </tbody>
                </table>
                <div class="row">
                    <a
                        href="{{ route('res-sections.index') }}"
                        class="btn btn-sm btn-light"
                    >
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>                    
                </div>
        </div>
    </div>
</div>
@endsection
