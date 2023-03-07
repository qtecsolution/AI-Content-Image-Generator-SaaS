<script type="text/javascript">
    function confirm_modal(delete_url) {
        "use strict"
        jQuery('#confirm-delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabels" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabels">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span>
                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L1 13M1 1L13 13" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>

                    </span>
                  </button>
            </div>
            <div class="modal-body">
                <p>Action confirmation message</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-custom " data-bs-dismiss="modal"
                    aria-label="Close">Cancel</button>
                <a id="delete_link" type="submit" class="btn btn-danger btn-custom">Execute</a>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function close_modal(delete_url, title) {
        "use strict"
        jQuery('#closeModal').modal('show', {
            backdrop: 'static'
        });
        $('.delete_link').attr('href', delete_url);

        $('.jobname').append(title);
    }
</script>

<!-- close modal  -->
<div class="closejob-modal">
    <div class="modal fade" id="closeModal" tabindex="-1" aria-labelledby="closeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="closeModalLabel">Close Job </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 1L1 13M1 1L13 13" stroke="#667085" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">
                        Are you still sure you want to close the <span class="jobname"></span> Job? You will no longer
                        be able to communicate with candidates and all remaining to-dos in the job will be marked as
                        inactive.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-cancel-btn" data-bs-dismiss="modal">cancel</button>
                    <a role="button" class="delete_link modal-close-btn">close</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- close modal  -->


<script type="text/javascript">
    function delete_modal(delete_url, title) {
        "use strict"
        jQuery('#deleteModal').modal('show', {
            backdrop: 'static'
        });
        $('.delete_link').attr('href', delete_url);
        $('.jobname').append(title);
    }
</script>
<!-- delete  modal  -->
<div class="deletejob-modal">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="closeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="closeModalLabel">Delete Job </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 1L1 13M1 1L13 13" stroke="#667085" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">
                        Are you still sure you want to delete the <span class="jobname"></span> Job? You will no longer
                        be able to communicate with candidates and all remaining to-dos in the job will be marked as
                        inactive.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-cancel-btn" data-bs-dismiss="modal">cancel</button>
                    <a role="button" class="delete_link modal-close-btn">delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- close modal  -->


<script type="text/javascript">
    function resourceDelete(delete_url) {
        "use strict"
        jQuery('#resourceDelete').modal('show', {
            backdrop: 'static'
        });
        $('#resourceDelete form').attr('action', delete_url);
    }
</script>
<!-- Modal -->
<div class="modal fade" id="resourceDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-trash3 text-danger"></i> Delete confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6> Are you sure you want to delete? </h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Close</button>
          <?php echo Form::open(['method' => 'delete']); ?>

          <button type="submit" class="btn btn-custom btn-danger"> <i class="bi bi-trash3"></i> Confirm</button>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div>
<?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/layouts/delete.blade.php ENDPATH**/ ?>