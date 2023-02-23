{{-- Delete Confirm Modal for resource --}}
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
          {!! Form::open(['method' => 'delete']) !!}
          <button type="submit" class="btn btn-custom btn-danger"> <i class="bi bi-trash3"></i> Confirm</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>