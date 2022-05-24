<div class="modal fade" id="ModalLogout" role="dialog" aria-labelledby="ModalLogout-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Logout Confirmation</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">Yakin ingin logout?</div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                <a href="<?= base_url('User/logout') ?>" class="btn btn-danger">logout</a>
            </div>
        </div>
    </div>
</div>