<!-- Modal Add Category -->
<div class="modal fade none-border" id="add-category">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
            <strong>Add New Order</strong>
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">             
              <div class="col-md-6">
                <label class="form-control-label">Category</label>
                <select class="form-control-label col-md-12 form-white" data-placeholder="Choose a color..." name="category-color">
                  <option value="success">Local Dishes</option>
                  <option value="danger">Breakfast</option>
                  <option value="info">Lunch/Diner</option>
                  <option value="info">Drinks</option>                   
                </select>
              </div>
              <div class="col-md-6">
                <label class="control-label">Number of Orders</label>
                <input class="form-control-label col-md-12 form-white" placeholder="Enter name" type="text" name="category-name" />
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL -->