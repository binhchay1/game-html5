<div class="modal fade" id="report-bug-modal" tabindex="-1" role="dialog" aria-labelledby="report-bug-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center p-3 h-auto">
                <h4 class="modal-title w-100 font-weight-bold text-dark" id="report-bug-modal-label">{{ __('Báo lỗi') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3 m-0">
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="report-bug-name" class="text-dark">{{ __('Tên') }}</label>
                    <input type="text" id="report-bug-name" class="form-control text-dark" disabled>
                </div>

                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="report-bug-email" class="text-dark">{{ __('Hòm thư') }}</label>
                    <input type="email" id="report-bug-email" class="form-control text-dark" disabled>
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="report-bug-note" class="text-dark">{{ __('Ghi chú') }}</label>
                    <textarea id="report-bug-note" class="form-control text-dark"></textarea>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-deep-orange text-dark" data-dismiss="modal">{{ __('Đóng') }}</button>
                <button type="button" class="btn btn-success" onclick="reportBug()">{{ __('Gửi') }}</button>
            </div>
        </div>
    </div>
</div>
