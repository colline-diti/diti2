<!-- Modal -->
<div class="modal fade none-border" id="replyEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Compose</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>                                                            
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >To</label>
                    <input type="text" name="quantity" class="form-control-label col-sm-8">
                </div>                                                                          
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Subject</label>
                    <input type="text" name="ordered" class="form-control-label col-sm-8">
                </div>  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Message</label>
                    <textarea style="height: auto;" type="text" name="remarks" class="form-control-label col-sm-8" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <div style="margin-left: 20%;" class="col-lg-offset-3 col-lg-8">
                      <span class="btn btn-sm green fileinput-button"><i class="fa fa-plus fa fa-white"></i>
                                                <span>Attachment</span>
                      <input type="file" name="files[]" multiple="">
                      </span>
                      <button class="btn btn-sm btn-primary" type="submit">Send</button>
                    </div>
                </div>                                                         
            </form>       
        </div>        
      </div>
    </div>
  </div>