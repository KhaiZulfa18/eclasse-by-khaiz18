<!-- Add Accounr Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="tweet-modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">What's Happening?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-add-account">
          <div class="row">
            <div class="form-group col-12 mb-4">
              <div class="col-lg-12">
                <textarea class="summernote-simple" id="tweet_txtarea" placeholder="What's Happening?"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnDismiss">Cancel</button>
        <button type="button" class="btn btn-primary" id="btnTweet">Tweet</button>
      </div>
    </div>
  </div>
</div>