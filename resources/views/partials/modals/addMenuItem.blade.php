<!-- Modal Add Category -->
<div class="modal fade none-border" id="addMenuItem">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Menu Item</strong></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Food Item</label>
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                <option value="success">Black Tea</option>
                                <option value="danger">African Tea</option>
                                <option value="info">English Tea</option>
                                <option value="pink">Chapatti</option>
                                <option value="primary">Beef Samosa</option>
                                <option value="warning">Peas Samosa</option>
                            </select>
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