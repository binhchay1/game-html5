<div class="modal fade" id="upload-file-modal" tabindex="-1" aria-labelledby="upload-file-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upload-file-modal-label">Upload file</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class='content'>
                    <form action="{{ route('dropzone-upload') }}" class='dropzone' id="dropzone-form"></form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
