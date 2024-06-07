<div class="modal modal-blur fade" id="unpublished<?php echo $unique_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Warning</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to Unpublish this POST ID : <?php echo $unique_id ?>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">No</button>
        <a href="controller/php/publish/unpublished?unique_id=<?php echo $unique_id ?>" class="btn btn-primary" name="yes_btn">Yes</a>
        </div>
    </div>
    </div>
</div>