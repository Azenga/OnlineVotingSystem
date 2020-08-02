<div class="modal fade" id="delete-level" tabindex="-1" 
    aria-labelledby="delete-level-label" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{ route('admin.levels.destroy', $level) }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="delete-level-label">Delete Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <p>Are you sure you want to delete (Level Name)?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Sure</button>
                </div>
            </div>
        </form>
    </div>
</div>