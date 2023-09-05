@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Chính sách cookie') }}</title>
@endsection

@section('css')
<style type="text/css">
    td {
        border-bottom: 1px solid;
    }
</style>
@endsection

@section('content')
<div class="white-box-bg box body static" style="padding: 25px 25px; text-align: justify;">
    <div class="title-container">
        <h1 class="header-5">{{ __('Chính sách cookie') }}</h1>
    </div>
    <p>
        <small>
            {{ __('Có hiệu lực vào ngày 25 tháng 5 năm 2018') }}
        </small>
    </p>
    <ol class="menu-policy">
        <li><a href="#section-1">{{ __('Định nghĩa thuật ngữ') }}</a></li>
        <li><a href="#section-2">{{ __('Cookie là gì?') }}</a></li>
        <li><a href="#section-3">{{ __('Chúng tôi sử dụng cookie để làm gì?') }}</a></li>
        <li><a href="#section-4">{{ __('Làm cách nào để kiểm soát hoặc tắt cookie?') }}</a></li>
        <li><a href="#section-5">{{ __('Chúng tôi sử dụng những loại cookie nào?') }}</a></li>
        <li><a href="#section-6">{{ __('Các loại cookie mà chúng tôi hiện đang sử dụng') }}</a></li>
        <li><a href="#section-7">{{ __('Cookie của bên thứ ba') }}</a></li>
    </ol>
    <h3 id="section-1">I. {{ __('Định nghĩa thuật ngữ') }}</h3>
    <p>
        {{ __('Các thuật ngữ “Chúng tôi”, “Của chúng tôi”, “Của chúng tôi” và “Chúng tôi”, cũng như tất cả các đại từ ngôi thứ nhất khác, được dùng để chỉ Web Entertainment Limited (“WEL”), công ty sở hữu, điều hành và duy trì Trang web và') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Tài khoản') }}.
    </p>
    <p>
        {{ __('Thuật ngữ “Trang web” được sử dụng để chỉ tất cả các trang web do Chúng tôi sở hữu, xuất bản hoặc duy trì, các chi nhánh hoặc đối tác kinh doanh của Chúng tôi, bao gồm nhưng không giới hạn ở') }} {{ env('APP_URL', 'Gamekafe.com') }}, pog.com, gamepost.com and dollmania.com.
    </p>
    <p>
        {{ __('Các thuật ngữ “Bạn”, “Của bạn”, “Người dùng”, cũng như tất cả các đại từ ngôi thứ hai khác, được dùng để chỉ người dùng Trang web và/hoặc dịch vụ do Chúng tôi cung cấp.') }}
    </p>
    <p>
        {{ __('Thuật ngữ') }} “{{ env('APP_NAME', 'Gamekafe') }} {{ __('Tài khoản” là hệ thống đăng nhập do Chúng tôi vận hành và duy trì cho người dùng, người chơi và nhà phát triển.') }}
    </p>
    <h3 id="section-2">II. {{ __('Cookie là gì?') }}</h3>
    <p>
        {{ __('Cookie là các tệp hoặc mẩu dữ liệu nhỏ mà Chúng tôi lưu trữ trên máy tính, điện thoại di động hoặc các thiết bị hỗ trợ internet khác của Bạn khi Bạn truy cập Trang web của Chúng tôi. Việc sử dụng cookie nhằm mục đích giúp Trang web của chúng tôi sử dụng dễ dàng hơn và cung cấp cho bạn trải nghiệm Web được cá nhân hóa.') }}
    </p>
    <p>
        {{ __('Những cookie thường chứa là kết quả của thông tin cá nhân do chính Bạn nhập vào một trang web. Thông thường, khi cookie lưu trữ thông tin cá nhân, thông tin này được mã hóa theo cách mà bất kỳ bên thứ ba nào tình cờ truy cập vào thư mục cookie của Bạn đều không thể đọc được.') }}
    </p>
    <p>
        {{ __('Cookie là một mẩu dữ liệu nhỏ được gửi từ các trang web của Chúng tôi và được trình duyệt web của Bạn lưu trữ trên máy tính của Bạn trong khi Bạn đang duyệt.') }}
    </p>
    <h4>
        {{ __('Về mặt kỹ thuật nó hoạt động như thế nào?') }}
    </h4>
    <p>
        {{ __('Khi được sử dụng, cookie sẽ được tải xuống máy tính của Bạn. Các tệp cookie được lưu trữ trên hoặc chuyển sang ổ cứng của Bạn.') }}
    </p>

    <h3 id="section-3">III. {{ __('Chúng tôi sử dụng cookie để làm gì?') }}</h3>
    <p>
        {{ __('Trang web và Dịch vụ của chúng tôi có thể sử dụng cookie. Cookie cho phép Chúng tôi cá nhân hóa trải nghiệm của Bạn trên các trang web của Chúng tôi, cho chúng tôi biết mọi người đã truy cập những phần nào trên Trang web của chúng tôi, giúp Chúng tôi đo lường hiệu quả của quảng cáo và tìm kiếm trên web, đồng thời cung cấp cho Chúng tôi thông tin chi tiết về hành vi của người dùng để Chúng tôi có thể cải thiện Trang web và Dịch vụ của mình. Dữ liệu này không đưa ra bất kỳ chi tiết cá nhân nào. Việc thu thập dữ liệu này được sử dụng để phân tích thống kê về Trang web của chúng tôi để chúng tôi sử dụng.') }}
    </p>

    <h3 id="section-4">IV. {{ __('Làm cách nào để kiểm soát hoặc tắt cookie?') }}</h3>
    <p>
        {{ __('Bạn có thể tắt hoặc xóa cookie bất cứ lúc nào. Xin lưu ý rằng vì cookie được sử dụng trên toàn bộ Trang web của chúng tôi, nên việc vô hiệu hóa hoặc xóa cookie có thể ngăn Bạn sử dụng một số phần nhất định trên Trang web và Dịch vụ của chúng tôi.') }}
    </p>
    <p>
        {{ __('Nếu bạn đang sử dụng Google Chrome, để tắt cookie:') }}
    </p>
    <ul>
        <li>{{ __("Đi đến 'Tiện ích'") }}</li>
        <li>{{ __("Nhấp vào 'Tùy chọn'") }}</li>
        <li>{{ __("Nhấp vào 'Dưới mui xe'") }}</li>
        <li>{{ __("'Cài đặt cookie' nên được chọn. Sau khi hoàn tất, hãy chọn 'Chặn tất cả Cookie'") }}</li>
        <li>{{ __('Bây giờ tất cả các cookie sẽ bị chặn trên Google Chrome của bạn') }}</li>
    </ul>
    <p></p>
    <p>
        {{ __('Để xóa các cookie hiện có:') }}
    </p>
    <ul>
        <li>{{ __("Đi đến 'Tiện ích'") }}</li>
        <li>{{ __("Nhấp vào 'Tùy chọn'") }}</li>
        <li>{{ __("Nhấp vào 'Dưới mui xe'") }}</li>
        <li>{{ __("Trong phần 'Quyền riêng tư', chọn 'Hiển thị cookie'") }}</li>
        <li>{{ __("Một cửa sổ mới sẽ mở ra có tên là 'Cookie' Tại đây, bạn có thể xem tất cả các cookie trong Trình duyệt Google Chrome của mình.") }}</li>
        <li>{{ __("Nhấp vào 'Xóa tất cả' để xóa tất cả dấu vết của cookie") }}</li>
        <li>{{ __("Nếu bạn chỉ muốn xóa một cookie nhất định, chỉ cần đánh dấu và nhấp vào 'Xóa'") }}</li>
    </ul>
    <p></p>
    <h4>
        {{ __('Các trình duyệt khác') }}
    </h4>
    <p>
        {{ __('Đối với các trình duyệt khác, vui lòng xem tài nguyên hoặc nguyên tắc hỗ trợ của trình duyệt có liên quan.') }}
    </p>

    <h3 id="section-5">V. {{ __('Chúng tôi sử dụng những loại cookie nào?') }}</h3>
    <p>
        {{ __('Trang web của chúng tôi sử dụng cookie phiên và cookie liên tục.') }}
    </p>
    <p>
        <b>{{ __('Cookie phiên:') }}</b> {{ __('Đây là những tệp cookie tạm thời sẽ bị xóa khi Bạn đóng trình duyệt của mình.') }}
    </p>
    <p>
        <b>{{ __('Cookie liên tục:') }}</b> {{ __('Chúng nằm trong một trong các thư mục con của trình duyệt của Bạn cho đến khi Bạn xóa chúng hoặc chúng hết hạn.') }}
    </p>

    <h3 id="section-6">VI. {{ __('Các loại cookie mà chúng tôi hiện đang sử dụng') }}</h3>
    <table border="0" cellspacing="10" cellpadding="10" class="valign-top">
        <tbody>
        </tbody>
        <colgroup>
            <col varlign="top" class="four">
            <col class="twelve">
        </colgroup>

        <tbody>
            <tr>
                <td>
                    <strong>
                        {{ __('Xác thực') }}
                    </strong>
                </td>
                <td>
                    {{ __('Cookie xác thực được các máy chủ web sử dụng để biết bạn đã đăng nhập hay chưa và bạn đã đăng nhập bằng tài khoản nào. Cookie này cho phép chúng tôi cung cấp cho bạn trải nghiệm web được cá nhân hóa trên Trang web của chúng tôi.') }}
                </td>
            </tr>

            <tr>
                <td>
                    <strong>
                        {{ __('Hiệu suất') }}
                    </strong>
                </td>
                <td>
                    {{ __('Chúng tôi sử dụng các cookie này để trải nghiệm của Bạn trên Trang web của chúng tôi và hiệu suất. Những cookie này thu thập thông tin về cách Trang web của chúng tôi được sử dụng, ví dụ như trang nào Bạn truy cập thường xuyên nhất và nơi gửi thông báo lỗi. Dữ liệu đó không đưa ra bất kỳ chi tiết cá nhân nào.') }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        {{ __('Phân tích') }}
                    </strong>
                </td>
                <td>
                    {{ __('Những cookie này cung cấp cho Chúng tôi các báo cáo cung cấp số liệu thống kê giúp Chúng tôi xác định cách khách truy cập sử dụng Trang web của chúng tôi, cách họ truy cập Trang web của chúng tôi và cách Chúng tôi có thể giúp họ tìm đường quay lại.') }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        {{ __('Bản địa hóa') }}
                    </strong>
                </td>
                <td>
                    {{ __('Cookie bản địa hóa giúp Chúng tôi cung cấp cho Bạn trải nghiệm được bản địa hóa và cá nhân hóa hơn. Vì mục đích đó, chúng tôi có thể thu thập và lưu trữ thông tin có trên trình duyệt hoặc máy tính của Bạn để Bạn có thể xem Trang web bằng ngôn ngữ ưa thích của mình.') }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        {{ __('Quảng cáo') }}
                    </strong>
                </td>
                <td>
                    {{ __('Trang web của chúng tôi có thể sử dụng cookie để gửi quảng cáo cá nhân. Quảng cáo được cá nhân hóa mang lại trải nghiệm quảng cáo phù hợp hơn đồng thời giúp tài trợ cho việc phát triển các trò chơi mới.') }}
                </td>
            </tr>
        </tbody>
    </table>
    <h3 id="section-7">VII. {{ __('Cookie của bên thứ ba') }}</h3>
    <p>
        {{ __('Chúng tôi sử dụng một số dịch vụ của bên thứ ba cũng có thể đặt cookie trên máy tính của Bạn thay mặt Chúng tôi khi bạn truy cập Trang web của Chúng tôi để cho phép họ cung cấp các dịch vụ mà họ đang cung cấp. Ví dụ: Chúng tôi đang sử dụng cookie của bên thứ ba cho mục đích thống kê. Thông tin thêm về các cookie này có sẵn trên trang web của bên thứ ba tương ứng.') }}
    </p>
</div>
@endsection
