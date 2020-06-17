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
        <input type="hidden" name="id_note" id="id_note">
        <input type="hidden" name="pageno" id="pageno">
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnDismiss">No</button>
        <button type="button" class="btn btn-danger" id="btnDelete">Yes</button>
      </div>
    </div>
  </div>
</div>
