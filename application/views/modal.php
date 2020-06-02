<!-- Delete Data Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Realy?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="delete-text"></div>
        <input type="hidden" name="id_user" id="id_user">
        <input type="hidden" name="pageno" id="pageno">
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnDismiss">No</button>
        <button type="button" class="btn btn-danger" id="btnDelete">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="delete-account-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Realy?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="delete-account-text"></div>
        <input type="hidden" name="id_account" id="id_account">
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnDismissAcc">No</button>
        <button type="button" class="btn btn-danger" id="btnDeleteAcc">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Accounr Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addaccount-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Your Social Media Account?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-add-account">
          <input type="hidden" name="id_user" id="id_user">
          <div class="form-group">
            <label>Name Account</label>
            <input type="text" name="name_account" class="form-control" id="name_account" placeholder="Ex : Khai Zulfa or @khaiz.18_">
          </div>
          <div class="form-group">
            <label class="d-block">Radio</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="type_account" id="facebook" value="facebook" checked>
              <label class="form-check-label" for="exampleRadios1">
                <i class="fab fa-facebook mr-1 ml-2"></i>
                Facebook
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="type_account" id="twitter" value="twitter" checked>
              <label class="form-check-label" for="exampleRadios1">
                <i class="fab fa-twitter mr-1 ml-2"></i>
                Twitter
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="type_account" id="instagram" value="instagram" checked>
              <label class="form-check-label" for="exampleRadios1">
                <i class="fab fa-instagram mr-1 ml-2"></i>
                Instagram
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="type_account" id="website" value="link" checked>
              <label class="form-check-label" for="exampleRadios1">
                <i class="fa fa-link mr-1 ml-2"></i>
                Website
              </label>
            </div>
          </div>
          <div class="form-group">
            <label>Link</label>
            <input type="text" class="form-control" name="link_account" id="link_account" placeholder="Ex : https://facebook.com/your_account">
          </div>
          <div class="col-lg-12">
            <div id="attention"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnDismiss">Cancel</button>
        <button type="button" class="btn btn-success" id="btnAdd">Add</button>
      </div>
    </div>
  </div>
</div>