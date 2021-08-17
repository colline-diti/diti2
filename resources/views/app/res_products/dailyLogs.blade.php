@extends('layouts.appbar')

@section('content')
<div class="container-fluid">
  <div class="row">   
      <!-- /# column -->
      <div class="col-lg-12 p-l-0 title-margin-left">
          <div class="page-header">
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">From</label>
                        <input type="date" name="id" class="form-control-label row col-sm-8" placeholder="Provide Summary">
                    </div> 
                    <div style="margin-left: 10%;" class="form-group row">
                        <label class="radio-inline">
                            <input type="radio" name="optradio"> &nbsp;&nbsp;Completed Payment
                        </label>       
                    </div>                     
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">To</label>
                        <input type="date" name="id" class="form-control-label row col-sm-8" placeholder="Provide Summary">
                    </div>
                    <div style="margin-left: 8%;" class="form-group row">
                        <label class="radio-inline">
                            <input type="radio" name="optradio"> &nbsp;&nbsp;Pending Payment
                        </label>       
                    </div>                   
                </div>
                <div class="col-md-4">
                    <div style="margin-top: 0.5%;" class="row">
                        <button style="margin-left: 20%;" type="submit" class="btn btn-sm btn-primary"><i class="ti-eye"></i> View</button>
                        <button style="margin-left: 10%;" type="submit" class="btn btn-sm btn-success">Export to Word</button>
                    </div>                  
                </div>
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
                  <div class="card-header">
                      <h4 class="card-title">
                            <!-- Create new Item-->
                            <a><span class="glyphicon glyphicon-edit"></span>
                             <i class="ti-user"></i> Daily Sales Report:
                           </a>                        
                           <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                            Back </span>
                           </a>
                      </h4>
                  </div>
                  <div class="card-body">
                      <div style="margin-top: 0.5em;" class="table-responsive">
                        <table class="table table-hover table-bordered ">
                            <thead class="thead-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Number of Items ordered</th>                                 
                                    <th>Total Cost(UGX)</th>  
                                    <th>Serviced by</th>                               
                                </tr>
                            </thead>
                            <tbody>                                  
                            <tr>
                                <td>Order 1</td>
                                <td>4</td>
                                <td>16,000</td>
                                <td>Colline Tazuba</td>                                                             
                            </tr>
                            <tr>
                                <td>Order 2</td>                                
                                <td>3</td>
                                <td>9,000</td>
                                <td>Namutebi Favor</td>                               
                            </tr>                                                         
                         </tbody>
                        </table>
                      </div>                   
                  </div>   
              </div>
          </div>    
      </div> 

    @include('partials.footer') 
  </section>
</div>
@endsection
