<div class="modal fade" id="edit-level" tabindex="-1" 
    aria-labelledby="edit-level-label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.levels.update', $level) }}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="edit-level-label">Edit Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa fa-2x fa-info-circle text-info"></i>
                        <span class="ml-3">Changes the name the level of a position</span>
                    </div>
                        <div class="my-t">
                            <label for="edit-level-title" class="col-form-label">Title</label>
                            <input type="text" class="form-control" name="title" 
                                id="edit-level-title" @error('title') is-invalid @enderror
                                value="{{ old('title') ?? $level->title }}">
                        </div>
                        <div class="clearfix my-3">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
            </div>
        </form>

    </div>
</div>