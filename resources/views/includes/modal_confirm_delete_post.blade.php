<div class="modal fade" id="delete-post-modal" tabindex="-1" aria-labelledby="delete-post-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-post-modal-label">Delete post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure about delete this post ?
            </div>
            <form action="{{ route('post.delete') }}" method="get">
                @csrf
                <input type="hidden" name="id-post" value="{{ $post->id }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
