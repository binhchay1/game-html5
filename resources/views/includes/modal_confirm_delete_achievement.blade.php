<div class="modal fade" id="delete-achievement-modal" tabindex="-1" aria-labelledby="delete-achievement-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-achievement-modal-label">Delete achievement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure about delete this achievement ?
            </div>
            <form action="{{ route('achievement.delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id-achievement">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
