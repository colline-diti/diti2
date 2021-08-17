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
                        <label class="col-sm-4 col-form-label">From</label>
                        <input type="date" name="id" class="form-control-label row col-sm-8" placeholder="Provide Summary">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Report Type</label>
                        <select class="form-control-label row col-sm-8" id="exampleFormControlSelect1">
                            <option class="form-control-label">Monthly</option>
                            <option class="form-control-label">Quatery</option>                                       
                        </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">To</label>
                        <input type="date" name="id" class="form-control-label row col-sm-8" placeholder="Provide Summary">
                    </div>
                    <div style="margin-top: 6%;" class="row">
                        <button style="margin-left: 32%;" type="submit" class="btn btn-sm btn-success"><i class="ti-eye"></i> View</button>                      
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
                  <div class="card-header color-primary">
                      <h4 class="card-title">
                            <!-- Create new Item-->
                            <a><span class="glyphicon glyphicon-edit"></span>
                             <i class="ti-user"></i> Stock Levels Report:
                           </a>                        
                           <a class="btn btn-sm btn-dark float-right" href="{{ url()->previous() }}" ><span><i class="ti-angle-double-left"></i>
                            Back </span>
                           </a>
                      </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <p>These should be monthly stock levels(Period of 12/May to 12/June)</p>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Commodity Name</th>                                
                                    <th>Quantity In</th>
                                    <th>Quantity Issued</th>
                                    <th>Damages</th>
                                    <th>Current Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12/06/2021</td>
                                    <td>Tomatoes</td>                                    
                                    <td>120kgs</td>
                                    <td>80kgs</td>
                                    <td>5kgs</td>
                                    <td>35kgs</td>
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
