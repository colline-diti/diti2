@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-8 p-r-0 title-margin-right">
          <div class="page-header">
              <div class="page-title">
                  <h1>Requisition Order</h1>
              </div>
          </div>
      </div>
      <!-- /# column -->
      <div class="col-lg-4 p-l-0 title-margin-left">
          <div class="page-header">
              <div class="page-title">
                  <ol class="breadcrumb">
                      <a class="breadcrumb-item" href="{{ route('cafeDashboard') }}"> Dashboard</a>
                      <a class="breadcrumb-item" href="{{ route('restaurant-requisitions.index') }}"> Restuarant Requisitions</a>
                  </ol>
              </div>
          </div>
      </div>
      <!-- /# column -->
  </div>
  <!-- /# row -->
  <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-success">
                    <div class="card-header border-success">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link disabled" tabindex="-1" aria-disabled="true" href="{{ route('restaurant-requisitions.index') }}">Requistion Order</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link active" aria-current="true"  href="">Detailed View</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link disabled" tabindex="-1" aria-disabled="true" href="#" >Charts</a>
                            </li>
                            <div style="margin-left: 58%;" class="card-title">
                                <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                                    Back </span>
                                </a>
                             </div>
                        </ul>
                      </div>
                      <div class="card-body">
                        <div class="card border-success mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <h5>Order ID: RO.{{ $restaurantRequisition->requisition_code ?? '-' }}</h5> 
                                    <h5 style="margin-left: 8em;"> Month: {{ $restaurantRequisition->Particulars ?? '-' }} </h5> 
                                </div>
                            </div>
                            <div class="card-body text-primary">
                                <div class="container-fluid">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="display-details float-right" >
                                                    <p style="text-align: right;"><strong>Status: </strong></p>
                                                    <p style="text-align: right;"><strong>Delivery Status: </strong></p>                                                                                                
                                                    <p style="text-align: right;"><strong>Created on:</strong></p>                                                   
                                                    <p style="text-align: right;"><strong>Remarks:</strong></p>
                                                </div>
                                            </div>
                  
                                            <div class="col-md-4">
                                                <div class="display-details float-left" >
                                                    
                                                    <p><span class="badge badge-danger">{{ $restaurantRequisition->status ?? '-' }}</span></p>
                                                    <p><span class="badge badge-warning">{{ $restaurantRequisition->delivery_status ?? '-' }}</span></p>                                                                                                    
                                                    <p>{{ $restaurantRequisition->created_at ?? '-' }}</p>                                                  
                                                    <p>{{ $restaurantRequisition->Particulars ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5>Total No. of Items:</h5> &nbsp;<p style="font-size: 1.3em;">13</p>
                                </div>
                                <div class="table-responsive">
                                    
                                    <table class="table table-hover table-bordered ">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>NO.</th>
                                                    <th>ITEM DESCRIPTION</th>
                                                    <th>QUANTITY</th>                                            
                                                    <th>DELIVERY DATE</th>                                            
                                                    <th>WEEK 2</th>
                                                    <th>WEEK 3</th>
                                                    <th>WEEK 4</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                @php
                                                    $requisitionItems = DB::select('SELECT requisition_items.name, restaurant_requisitions.requisition_code,requisition_items.id,requisition_deliveries.item_quantity,requisition_deliveries.delivery_date,requisition_deliveries.remarks
                                                    from requisition_deliveries,requisition_items,restaurant_requisitions 
                                                    WHERE (requisition_items.id = requisition_deliveries.requisition_item_id) AND 
                                                    restaurant_requisitions.requisition_code = 1002');
                                                    $k = "#";
                                                @endphp                                 
                                                @forelse($requisitionItems as $requisitionItem)
                                                
                                                <tr>
                                                    <td>{{ $k }}</td> 
                                                <td>{{ $requisitionItem->name ?? '-' }}</td>
                                                <td>{{ $requisitionItem->item_quantity ?? '-' }}</td>                                        
                                                                                       
                                                <td>{{ $requisitionItem->delivery_date ?? '-' }}</td>
                                                <td></td>
                                                <td></td>                                        
                                                <td></td> 
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3">
                                                    @lang('crud.common.no_items_found')
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            <div class="row" style="padding-top: 0.5em; margin-left: 0.5em;">
                                <a href = "">
                                    <button style="margin-right: 0.5em;" class="btn btn-sm btn-danger"><i class="ti-pencil"></i> More Detail...</button>
                                </a>                                
                                <button type="submit" style="margin-right: 0.5em;" class="btn btn-sm btn-success"> <i class="ti-download"></i> Export</button>
                                <button type="submit" style="margin-right: 0.5em;" class="btn btn-sm btn-primary"><i class="ti-files"></i> PDF</button>
                            </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                </div>
            </div>    
        </div> 

    @include('partials.footer') 
  </section>
</div>
@endsection
