<!-- Modal Add Category -->
<div class="modal fade none-border" id="saloonOrderDetails">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
            <strong>Order Details</strong>
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>                              
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Each(UGX)</th>
                                <th>Total(UGX)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>                              
                                <td>Hair Cut</td>
                                <td>3</td>
                                <td>30,000</td>
                                <td>90,000</td>
                            </tr>
                            <tr>                               
                                <td>Hair Plainting</td>
                                <td>1</td>
                                <td>50,000</td>
                                <td>50,000</td>
                            </tr>                            
                        </tbody>
                    </table>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 row">
                                <h6>Balance Due:</h6> &nbsp;&nbsp;<div class="color-danger">UGX 56,000</div>         
                            </div>
                            <div class="col-md-6 row">
                                  <h6>TOTAL:</h6> &nbsp;&nbsp; <div class="color-success">UGX 56,000</div>
                            </div>
                       </div>                      
                        <div style="margin: auto;" class="col-md-12 row">
                            <a href="#">
                                <button style="margin-left: 8%;" type="button" class="btn btn-sm btn-success"><i class="ti-plus"></i> Add Item</button>
                            </a>                             
                            <form class="form-inline">                               
                                <div class="form-group mx-sm-3 mb-2">                               
                                <input type="text" class="form-control-label" id="inputPassword2" placeholder="Enter ammount">
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark mb-2"><i class="ti-plus"></i> Pay Now</button>
                            </form>
                            <button style="margin-left: 45%;" onclick="window.print()" type="button" class="btn btn-sm btn-info"><i class="ti-plus"></i> Print</button>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
              
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL -->