<div class="modal fade" id="add-search-modal" tabindex="-1" role="dialog" aria-labelledby="add-search-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-search-modal-title">Add keyword</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('search.create') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="keyword">Keyword</label>
                        <input type="text" class="form-control" id="keyword" name="keyword">
                    </div>

                    <div class="form-group">
                        <label for="locale">Locale</label>
                        <select class="form-control" id="locale" name="locale">
                            <option value="vn">Vietnamese</option>
                            <option value="th">Thai</option>
                            <option value="ro">Romanian</option>
                            <option value="hr">Croatian</option>
                            <option value="en" selected>English</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0" selected>De-active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>
