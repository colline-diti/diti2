
   
<!-- Modal -->
<div class="modal fade" id="addStock" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Add Stock Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('store-stock')}}">
                    <table class="table">
                        <thead>
                          <tr>                            
                            <th>ITEM</th>
                            <th>QUANTITY</th>                                                      
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="addRow">                                                     
                            <td class="col-md-3">
                              <input class="form-control addPrefer" type="text" placeholder="Enter Item"/>                           </td>
                            <td class="col-md-2">
                              <input class="form-control addCommon" type="text" placeholder="Quantity" />
                            </td>                                                                                         
                            <td class="col-md-1 text-center">
                              <span class="addBtn">
                                  <i class="fa fa-plus"></i>
                                </span>
                            </td>
                          </tr>                           
                          <tr>
                              <td style="font-size:20px;" colspan="8" ></td>                                                  
                          </tr>
                        </tbody>
                    </table>  
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Date</label>
                        <input type="date" id="date" name="date" class="form-control-label col-sm-4">
                        <label style="margin-left: 10%;" class="col-sm-2 col-form-label">Receipt</label>
                        <input type="file" class="form-control-label">
                    </div>                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-success"> <i class="ti-save-alt"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function totalinstock() {
        var totalrecieved = document.getElementById('quantityin').value;
        var damages = document.getElementById('damages').value;
        document.getElementById('instock').value = (totalrecieved - damages);

        let date = new Date();
        document.getElementById('date').value = date;
        console.log(date);

    }

</script>
