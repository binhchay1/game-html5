<div class="modal show" id="thank-report-modal" tabindex="-1" role="dialog" aria-labelledby="thank-report-modal-title" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ftco-degree-bg">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="ion-ios-close"></span>
                </button>
            </div>
            <div class="modal-body pt-md-0 pb-md-5 text-center">
                <h2>{{ __('Chúng tôi đã tiếp nhận thông báo') }}</h2>
                <div class="icon d-flex align-items-center justify-content-center">
                    <img src="{{ asset('svg/email.svg') }}" alt="" class="img-fluid">
                </div>
                <h4 class="mb-2 text-dark">{{ __('Chúng tôi đã tiếp nhận được đóng góp của bạn. Chúng tôi sẽ phản hồi sớm thông qua hòm thư của bạn như bên dưới :') }}</h4>
                <div class="d-flex justify-content-center">
                    <h3 class="mb-2 text-dark" id="pre-email-thank"></h3>
                    <span class="text-dark font-italic h4">@</span>
                    <h3 class="mb-2 text-dark" id="last-email-thank">gmail.com</h3>
                </div>
            </div>
        </div>
    </div>
</div>
