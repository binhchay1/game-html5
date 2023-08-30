@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Chính sách') }}</title>
@endsection

@section('content')
<div class="white-box-bg box body static" style="padding: 25px; text-align: justify;">
    <div class="title-container">
        <h1 class="header-5">{{__('Chính sách bảo mật')}}</h1>
    </div>
    <p>
        <small>
            {{ __('Có hiệu lực từ ngày 25 tháng 7 năm 2023') }}
        </small>
    </p>

    <p>
        {{ __('Chính sách quyền riêng tư này (“Chính sách”), cùng với Điều khoản dịch vụ của chúng tôi (“Điều khoản”), tiết lộ các thông lệ về quyền riêng tư của Web Entertainment Limited (“WEL”) liên quan đến bất kỳ Dữ liệu cá nhân nào mà Bạn cung cấp hoặc cung cấp cho Chúng tôi hoặc Chúng tôi nhận được từ Bạn hoặc được biết đến với chúng tôi.') }}
    <p>
        {{ __('Xin vui lòng đọc chính sách này một cách cẩn thận. Bằng cách truy cập hoặc sử dụng Trang web của chúng tôi, Bạn thừa nhận rằng Bạn đã đọc, hiểu và đồng ý bị ràng buộc bởi các điều khoản của Chính sách này. Nếu Bạn không đồng ý với Chính sách này, vui lòng không sử dụng Trang web của chúng tôi. Chúng tôi bảo lưu quyền thay đổi Chính sách này theo thời gian và Bạn có trách nhiệm xem xét Chính sách này một cách thường xuyên. Bằng cách truy cập hoặc sử dụng Trang web của chúng tôi, bạn có thông báo xây dựng về Chính sách này, được cung cấp trên tất cả các Trang web của chúng tôi.') }}
    </p>
    <p>
        {{ __('Chính sách này được điều chỉnh và hiểu theo Pháp lệnh Dữ liệu Cá nhân (Quyền riêng tư), Cap. 486, luật của Đặc khu hành chính Hồng Kông (“HKSAR”) và các luật, quy tắc và quy định có liên quan khác trong hoặc ngoài phạm vi quyền hạn của HKSAR. Chủ thể dữ liệu là người dùng của Trang web và Người dùng dữ liệu là WEL.') }}
    </p>
    <p>
        {{ __('Đối với Người dùng ở EU, Chính sách quyền riêng tư này tuân thủ Quy định bảo vệ dữ liệu chung (GDPR).') }}
    </p>
    <p>
        {{ __('Chính sách bảo mật của chúng tôi giải thích:') }}
    </p>
    <ul>
        <li>{{ __('Chúng tôi nhận được thông tin gì') }}</li>
        <li>{{ __('Cách chúng tôi sử dụng thông tin đó') }}</li>
        <li>{{ __('Các lựa chọn Chúng tôi cung cấp, bao gồm cách truy cập và cập nhật thông tin') }}</li>
    </ul>
    <p></p>
    <p>
        {{ __('Để tạo điều kiện thuận lợi cho việc đọc của Bạn, đây là phác thảo Chính sách Bảo mật của Chúng tôi:') }}
    </p>
    <ol>
        <li><a href="#section-I">{{ __('Các định nghĩa') }}</a></li>
        <li><a href="#section-II">{{ __('Thông tin chúng tôi nhận được và cách sử dụng thông tin đó') }}</a></li>
        <li><a href="#section-III">{{ __('Các trang web khác') }}</a></li>
        <li><a href="#section-IV">{{ __('Cookies và các công nghệ tương tự') }}</a></li>
        <li><a href="#section-V">{{ __('Bảo vệ thông tin cá nhân') }}</a></li>
        <li><a href="#section-VI">{{ __('Truy cập và Chỉnh sửa Thông tin Cá nhân của Bạn') }}</a></li>
        <li><a href="#section-VII">{{ __('Trẻ em và trẻ vị thành niên') }}</a></li>
        <li><a href="#section-VIII">{{ __('Quyền đối với thông tin cá nhân của bạn') }}</a></li>
        <li><a href="#section-IX">{{ __('Liên hệ với chúng tôi') }}</a></li>
    </ol>
    <p></p>

    <h3 id="section-I">
        I. {{ __('Sự định nghĩa') }}
    </h3>
    <p>
        {{ __('Thuật ngữ “Dữ liệu cá nhân” và “Thông tin cá nhân” đề cập đến bất kỳ dữ liệu hoặc thông tin nào liên quan trực tiếp hoặc gián tiếp đến một cá nhân, từ đó có thể xác định được danh tính của cá nhân đó một cách trực tiếp hoặc gián tiếp và ở dạng truy cập hoặc xử lý dữ liệu là có thể thực hiện được. Đối với các mục đích của Chính sách này, các từ "dữ liệu" và "thông tin" có cùng ý nghĩa.') }}
    </p>
    <p>
        {{ __('Thuật ngữ “ID Người dùng” đề cập đến tên người dùng Bạn sử dụng để xác định Tài khoản Gamekafe của Bạn.') }}
    </p>
    <p>
        {{ __('Các thuật ngữ “Chúng tôi”, “Của chúng tôi”, “Của chúng tôi” và “Chúng tôi”, cũng như tất cả các đại từ ngôi thứ nhất khác, được dùng để chỉ WEL, công ty sở hữu, điều hành và duy trì Trang web và Tài khoản.') }} {{ env('APP_NAME', 'Gamekafe') }}
    </p>
    <p>
        {{ __('Thuật ngữ “Trang web” được sử dụng để chỉ tất cả các trang web trò chơi và video do Chúng tôi sở hữu, xuất bản hoặc duy trì, các chi nhánh hoặc đối tác kinh doanh của Chúng tôi, bao gồm nhưng không giới hạn ở Tài khoản') }} {{ env('APP_NAME', 'Gamekafe') }}
    </p>
    <p>
        {{ __('Các thuật ngữ “Bạn”, “Của bạn”, “Người dùng”, cũng như tất cả các đại từ ngôi thứ hai khác, được dùng để chỉ người dùng và/hoặc người chơi của Trang web và/hoặc dịch vụ do Chúng tôi cung cấp.') }}
    </p>
    <p>
        {{ __('Thuật ngữ “Tài khoản') }} {{ env('APP_NAME', 'Gamekafe') }}” {{ __('dùng để chỉ một hệ thống đăng nhập do Chúng tôi vận hành và duy trì cho người dùng, người chơi và nhà phát triển.') }}
    </p>

    <h3 id="section-II">
        II. {{ __('Thông tin chúng tôi nhận được và cách sử dụng thông tin đó') }}
    </h3>

    <h4>
        (a) {{ __('Thông tin chúng tôi nhận được về bạn') }}
    </h4>
    <p>
        {{ __('Thông tin mà Chúng tôi nhận được bao gồm các bộ thông tin: Thông tin của Bạn và thông tin chúng tôi nhận được về Bạn.') }}
    </p>
    <p>
        {{ __('Thông tin của Bạn là thông tin được nhập khi Bạn điền vào biểu mẫu trên Trang web của chúng tôi, khi Bạn đăng ký, tức là Tài khoản') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('của Bạn. Nó bao gồm tên, địa chỉ email, ngày sinh và giới tính của bạn.') }}
    </p>
    <p>
        {{ __('Thông tin Chúng tôi nhận được về mối quan tâm của Bạn') }}
    </p>

    <h5>
        i. {{ __('thông tin phi cá nhân:') }}
    </h5>
    <ul>
        <li>
            {{ __('Dữ liệu liên quan đến việc sử dụng Trang web, chẳng hạn như ngày và giờ Bạn truy cập Trang web, địa chỉ trang web hoặc URL Bạn đang truy cập')}}
        </li>
        <li>
            {{ __('Dữ liệu liên quan đến các dịch vụ và hoạt động của Trang web, chẳng hạn như trò chơi Bạn chơi, điểm số Bạn đạt được trong trò chơi được hỗ trợ, thành tích Bạn đã đạt được trong các trò chơi được hỗ trợ và tiến độ trò chơi của Bạn trong các trò chơi được hỗ trợ.') }}
        </li>
    </ul>

    <h5>
        ii. {{ __('thông tin kỹ thuật, bao gồm:') }}
    </h5>
    <ul>
        <li>
            {{ __('địa chỉ IP') }}
        </li>
        <li>
            {{ __('trình duyệt bạn sử dụng') }}
        </li>
        <li>
            {{ __('hệ điều hành bạn sử dụng') }}
        </li>
        <li>
            {{ __('if You are logged in to') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Account, Your User ID.') }}
        </li>
    </ul>

    <h4>
        {{ __('(b) Cách chúng tôi sử dụng thông tin chúng tôi nhận được') }}
    </h4>
    <p>
        {{ __('Bất kỳ thông tin nào chúng tôi nhận được liên quan đến Bạn là để cho phép Chúng tôi cung cấp các dịch vụ tốt hơn cho Bạn. Chúng tôi có thể sử dụng thông tin phi cá nhân và thông tin kỹ thuật để cải thiện thiết kế và nội dung của Trang web của chúng tôi, để cá nhân hóa trải nghiệm của khách truy cập hoặc để cung cấp sản phẩm, chương trình và dịch vụ.')}}
    </p>
    <p>
        {{ __('Chúng tôi cũng có thể sử dụng thông tin để đảm bảo rằng Người dùng của chúng tôi tuân thủ Điều khoản của chúng tôi. Chúng tôi không giữ lại bất kỳ Thông tin cá nhân nào ngoài thời gian cần thiết.')}}
    </p>

    <h4>
        {{ __('(c) Thông tin chúng tôi chia sẻ') }}
    </h4>
    <p>
        {{ __('Chúng tôi không chia sẻ thông tin Tài khoản Gamekafe của Bạn với các công ty, tổ chức và cá nhân bên ngoài Công ty trừ khi xảy ra một trong các trường hợp sau:')}}
    </p>

    <h5>
        {{ __('Với sự đồng ý của bạn') }}
    </h5>
    <p>
        {{ __('Chúng tôi sẽ chia sẻ thông tin Tài khoản Gamekafe của Bạn với các công ty, tổ chức và cá nhân bên ngoài Công ty khi Chúng tôi được bạn đồng ý làm như vậy. Chúng tôi cũng chia sẻ Thông tin của bạn cho các trò chơi của bên thứ ba sử dụng hệ thống đăng nhập Tài khoản') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Chúng tôi yêu cầu sự đồng ý chọn tham gia để chia sẻ bất kỳ Thông tin cá nhân nào.') }}
    </p>

    <h5>
        {{ __('Đối với xử lý bên ngoài') }}
    </h5>
    <p>
        {{ __('Chúng tôi cung cấp Thông tin cá nhân cho các chi nhánh của Chúng tôi hoặc các doanh nghiệp hoặc người đáng tin cậy khác để xử lý thông tin đó cho Chúng tôi hoặc công ty lưu trữ lưu trữ tất cả Dữ liệu, dựa trên hướng dẫn của Chúng tôi và tuân thủ Chính sách quyền riêng tư của Chúng tôi cũng như bất kỳ quy tắc và quy định có liên quan nào khác với các biện pháp bảo mật và an ninh .')}}
    </p>

    <h5>
        {{ __('Vì lý do pháp lý') }}
    </h5>
    <p>
        {{ __('Chúng tôi chia sẻ Thông tin cá nhân với các công ty, tổ chức hoặc cá nhân, bên ngoài Công ty, nếu Chúng tôi có niềm tin hợp lý rằng việc truy cập, sử dụng, bảo toàn hoặc tiết lộ thông tin là cần thiết một cách hợp lý để:')}}
    </p>
    <ul>
        <li>
            {{ __('đáp ứng mọi luật, quy định, quy trình pháp lý hiện hành hoặc yêu cầu có thể thi hành của chính phủ (bao gồm các yêu cầu pháp lý từ các khu vực tài phán bên ngoài Hồng Kông)') }}
        </li>
        <li>
            {{ __('thực thi các Điều khoản dịch vụ hiện hành, bao gồm cả việc điều tra các vi phạm tiềm ẩn, phát hiện, ngăn chặn hoặc giải quyết các vấn đề gian lận, bảo mật hoặc kỹ thuật; hoặc')}}
        </li>
        <li>
            {{ __('bảo vệ chống lại tác hại đối với các quyền, tài sản hoặc sự an toàn của Trang web, Người dùng của chúng tôi hoặc công chúng theo yêu cầu hoặc được pháp luật cho phép.')}}
        </li>
    </ul>
    <p></p>
    <p>
        {{ __('Nếu Công ty tham gia vào việc sáp nhập, mua lại hoặc bán hoặc định đoạt tài sản, Chúng tôi sẽ tiếp tục nỗ lực hết mình để đảm bảo tính bảo mật của tất cả Thông tin cá nhân mà Chúng tôi đã thu thập và thông báo cho Người dùng bị ảnh hưởng trước khi Thông tin cá nhân được chuyển giao hoặc trở thành đối tượng của một chính sách bảo mật khác nhau.')}}
    </p>

    <h4>
        {{ __('(d) Nơi đặt thông tin của Bạn') }}
    </h4>
    <p>
        {{ __('Chúng tôi được thành lập và có trụ sở tại Hồng Kông. Tuy nhiên, hệ thống đăng nhập của chúng tôi được lưu trữ bởi các máy chủ ở Hà Lan. Thông tin cá nhân có thể được Chúng tôi truy cập hoặc chuyển giao cho Chúng tôi ở Hà Lan hoặc cho các chi nhánh, đối tác kinh doanh hoặc nhà cung cấp dịch vụ của Chúng tôi ở những nơi khác trên thế giới. Bằng cách cung cấp cho Chúng tôi thông tin Chúng tôi nhận được về Bạn, Bạn đồng ý với việc chuyển giao đó. Chúng tôi sẽ nỗ lực hết sức để bảo vệ quyền riêng tư và tính bảo mật của thông tin này theo Chính sách quyền riêng tư của chúng tôi, bất kể nó được xử lý hoặc lưu trữ ở đâu.') }}
    </p>

    <h3 id="section-III">
        III. {{ __('Trang web của chúng tôi và các trang web khác') }}
    </h3>

    <h4>
        {{ __('(a) Về trang web của chúng tôi') }}
    </h4>
    <p>
        {{ __('Trang web của chúng tôi sử dụng hệ thống đăng nhập một lần cho phép Bạn kết nối giữa các Trang web, bao gồm trò chơi và tương tác xã hội. Bằng cách này, Chúng tôi có thể cung cấp cho Bạn trải nghiệm được cá nhân hóa trên Trang web.') }}
    </p>
    <p>
        {{ __('Bạn được nhắc nhở rằng các liên kết có hoặc bao gồm trong Trang web và Dịch vụ của chúng tôi có thể hướng Bạn đến các trang web của bên thứ ba và chúng được tạo và duy trì bởi các doanh nghiệp và nhà phát triển khác không thuộc Công ty, vì vậy điều quan trọng là Bạn phải đọc các điều khoản dịch vụ và chính sách quyền riêng tư của họ vì đây là trách nhiệm của Bạn.') }}
    </p>

    <h4>
        {{ __('(b) Đăng nhập vào một trang web khác bằng cách sử dụng') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Tài khoản') }}
    </h4>
    <p>
        {{ __('Trong một số trường hợp, Bạn có thể đăng nhập vào các trang web của bên thứ ba bằng cách sử dụng danh tính Tài khoản') }} {{ env('APP_NAME', 'Gamekafe') }}. {{ __('Điều này có nghĩa là Bạn có khả năng sử dụng danh tính Tài khoản') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('mặc định hoặc tạo danh tính mới để đăng nhập vào trang web của bên thứ ba. Bạn có thể xác định bạn muốn truy cập các trang web của bên thứ ba dưới danh tính nào. Khi Bạn đăng nhập bằng Tài khoản') }} {{ env('APP_NAME', 'Gamekafe')}}, {{ __('thông tin tài khoản của Bạn sẽ không bao giờ được chuyển sang trang web của bên thứ ba mà không có sự đồng ý của Bạn (Mục II (c)). Để các trang web bên thứ ba nhận dạng duy nhất tài khoản của Bạn trong số các tài khoản khác, Chúng tôi gửi một mã định danh duy nhất có tên là PID (nhận dạng cá nhân). PID của bạn khác nhau đối với mỗi trang web của bên thứ ba để bảo vệ tính ẩn danh của bạn.')}}
    </p>
    <p>
        {{ __('Xin lưu ý rằng có khả năng các trang web, trò chơi hoặc dịch vụ của bên thứ ba có thể yêu cầu Bạn cung cấp thông tin khác với thông tin trong các trường bạn đã chọn để điền vào.') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Nhận dạng tài khoản. Chẳng hạn, Bạn đã điền tên và quốc gia của mình nhưng trang web của bên thứ ba yêu cầu Bạn cung cấp cả biệt danh của Bạn. Thông tin bổ sung được yêu cầu có thể khác nhau tùy theo trang web, trò chơi hoặc dịch vụ của bên thứ ba này sang trang web, trò chơi hoặc dịch vụ khác. Sau khi bạn làm như vậy, thông tin bổ sung được cung cấp sẽ tự động được thêm vào danh tính mà bạn đã truy cập trang web đó. Do đó, tất cả các trang web được liên kết với danh tính đó cũng sẽ được hưởng lợi từ thông tin bổ sung đó. Tuy nhiên, Bạn có thể xem trang web của bên thứ ba nào có quyền truy cập vào thông tin nào mà Bạn đã cung cấp bằng cách vào phần “Trang web” của Trang web của bạn.') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Tài khoản') }}.
    </p>
    <p>
        {{ __('Nếu Bạn đã có tài khoản trên trang web của bên thứ ba, trang web đó cũng có thể cho phép Bạn kết nối và liên kết nó với Trang web của Bạn.') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Tài khoản. Thông tin của bạn sẽ được gửi cho chúng tôi khi bạn sử dụng')}} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Tài khoản để đăng ký hoặc đăng nhập vào trang web của bên thứ ba.') }}
    </p>

    <h4>
        {{ __('(c) Thực hành quyền riêng tư của bên thứ ba') }}
    </h4>
    <p>
        {{ __('Tuyên bố về quyền riêng tư này chỉ đề cập đến việc sử dụng và tiết lộ thông tin của Chúng tôi thông qua tương tác của Bạn với các Trang web và Dịch vụ của Chúng tôi. Các trang web khác có thể truy cập được từ Trang web của chúng tôi có thể có các tuyên bố về quyền riêng tư và các hoạt động thu thập, sử dụng và tiết lộ Thông tin cá nhân của riêng họ. Chẳng hạn, và hoàn toàn là một ví dụ, một số trang web yêu cầu quyền truy cập trên mười tám (18) tuổi.') }}
    </p>
    <p>
        {{ __('Chúng tôi không chịu trách nhiệm về các chính sách bảo mật, thông lệ hoặc nội dung của các trang web bên thứ ba. Xin lưu ý rằng các thông lệ được mô tả trong Chính sách quyền riêng tư này không áp dụng cho thông tin được thu thập thông qua các trang web khác. Khi Bạn rời khỏi Trang web, các chính sách và thông lệ về quyền riêng tư của trang web khác đó sẽ được áp dụng; Chúng tôi khuyến khích Bạn nên biết về các chính sách và thông lệ về quyền riêng tư đó khi Bạn truy cập các trang web khác đó và gửi thông tin nhận dạng cá nhân. Bạn chịu trách nhiệm xem xét các chính sách và thông lệ về quyền riêng tư của từng và mọi trang web mà Bạn truy cập.') }}
    </p>

    <h3 id="section-IV">
        IV. {{ __('Cookie và các công nghệ khác') }}
    </h3>
    <p>
        {{ __('Trang web và Dịch vụ của chúng tôi có thể sử dụng cookie và các công nghệ khác. Bộ sưu tập dữ liệu này được sử dụng để phân tích thống kê về Trang web của chúng tôi cho mục đích phân tích. Những công nghệ này giúp Chúng tôi hiểu rõ hơn về hành vi của người dùng, cho Chúng tôi biết mọi người đã truy cập những phần nào trên Trang web của Chúng tôi, đồng thời tạo điều kiện và đo lường hiệu quả của quảng cáo và tìm kiếm trên web. Chúng tôi coi thông tin được thu thập bởi cookie và các công nghệ khác là thông tin phi cá nhân.') }}
    </p>
    <p>
        {{ __('Bất kỳ thông tin nào được chia sẻ hoặc biết với Chúng tôi sẽ không và không thể được sử dụng để xác định danh tính của Bạn vì chúng không cụ thể. Chúng chỉ là dữ liệu toán học hoặc phân tích về khách truy cập của Chúng tôi và việc sử dụng của họ trên Trang web của Chúng tôi. Dữ liệu không đưa ra bất kỳ chi tiết cá nhân nào. Cookie có thể được sử dụng để thu thập dữ liệu internet chung này. Khi được sử dụng, cookie sẽ được tải xuống máy tính của Bạn mà không cần nhắc. Tệp cookie được lưu trữ trên ổ cứng của Bạn, nơi các tệp được chuyển đến. Thông tin này giúp Chúng tôi cải thiện các Trang web và dịch vụ của Chúng tôi cung cấp cho Bạn. Nếu bạn muốn tắt cookie, vui lòng tham khảo các nguyên tắc liên quan của trình duyệt mà Bạn sử dụng và điều chỉnh cài đặt trình duyệt liên quan. Xin lưu ý rằng một số tính năng của Trang web có thể không khả dụng khi cookie bị tắt.') }}
    </p>
    <p>
        {{ __('Do các tiêu chuẩn giao tiếp trên mạng, khi Bạn truy cập Trang web, Chúng tôi sẽ tự động nhận được URL của trang web mà Bạn đã đến và trang web mà Bạn sẽ đến khi Bạn rời khỏi Trang web. Chúng tôi cũng nhận được địa chỉ Giao thức mạng (IP), loại trình duyệt và ngôn ngữ, nhà cung cấp dịch vụ Internet (ISP), các trang web và ứng dụng giới thiệu và thoát, hệ điều hành, dấu ngày/giờ và dữ liệu luồng nhấp chuột.') }}
    </p>
    <p>
        {{ __('Chúng tôi sử dụng thông tin này để hiểu và phân tích xu hướng, để quản lý trang web, tìm hiểu về hành vi của người dùng trên trang web, để cải thiện Dịch vụ của chúng tôi và để thu thập thông tin nhân khẩu học về toàn bộ cơ sở người dùng của chúng tôi. Chúng tôi có thể sử dụng thông tin này cho mục đích tiếp thị và quảng cáo. Liên kết giữa địa chỉ IP của Bạn và thông tin nhận dạng cá nhân của Bạn không được chia sẻ với bên thứ ba mà không có sự cho phép của Bạn.') }}
    </p>

    <h3 id="section-V">
        V. {{ __('Bảo vệ thông tin cá nhân') }}
    </h3>
    <p>
        {{ __('We take the security of your Personal Information very seriously. We work hard to protect the Website and Our users from unauthorized access, alteration, disclosure or destruction of information within Our control.') }}
    </p>
    <p>
    </p>
    <p>
        {{ __('Đặc biệt:') }}
    </p>
    <ul>
        <li>
            {{ __('Chúng tôi mã hóa nhiều dịch vụ của mình bằng Lớp cổng bảo mật (SSL)') }}
        </li>
        <li>
            {{ __('Chúng tôi xem xét các hoạt động thu thập, lưu trữ và xử lý thông tin của mình, bao gồm các biện pháp bảo mật vật lý, để bảo vệ chống truy cập trái phép vào hệ thống.') }}
        </li>
        <li>
            {{ __('Chúng tôi hạn chế quyền truy cập vào Thông tin cá nhân đối với nhân viên, nhà thầu và đại lý của Công ty, những người cần biết thông tin đó để xử lý thông tin đó cho Chúng tôi và những người phải tuân theo nghĩa vụ bảo mật theo hợp đồng và có thể bị kỷ luật hoặc chấm dứt hợp đồng nếu họ không đáp ứng các nghĩa vụ này.') }}
        </li>
    </ul>
    <p></p>
    <p>
        {{ __('Dữ liệu bạn cung cấp cho chúng tôi sẽ được lưu trữ trên các máy chủ an toàn. Chúng tôi thực hiện tất cả các bước hợp lý để đảm bảo an toàn cho việc truyền dữ liệu theo Chính sách này. Việc truyền dữ liệu qua Internet không bao giờ hoàn toàn an toàn, do đó không thể đảm bảo dữ liệu được gửi hoặc truyền đi bằng điện tử. Do đó, thông tin được cung cấp là rủi ro của riêng bạn.') }}
    </p>
    <p>
        {{ __('Chúng tôi sử dụng một phương pháp an toàn hợp lý để hủy Thông tin cá nhân.') }}
    </p>

    <h3 id="section-VI">
        VI. {{ __('Truy cập và thay đổi Thông tin cá nhân của bạn') }}
    </h3>
    <p>
        {{ __('Bạn có thể truy cập và thay đổi bất kỳ Thông tin Cá nhân nào mà Bạn đã cung cấp cho Chúng tôi khi đăng ký thông qua') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Trang tài khoản. Đối với một bộ đầy đủ bản sao Thông tin cá nhân mà chúng tôi có về Bạn, nó sẽ được cung cấp miễn phí trong một khoảng thời gian hợp lý và trong mọi trường hợp không quá 14 ngày sau khi Chúng tôi nhận được yêu cầu bằng văn bản từ Bạn. Chúng tôi có thể cần xác minh rằng Bạn thực sự là chủ thể dữ liệu trước khi Chúng tôi có thể tiến hành yêu cầu như vậy.') }}
    </p>
    <p>
        {{ __('Đôi khi, chúng tôi không thể xử lý yêu cầu thay đổi Thông tin cá nhân của bạn vì lý do kỹ thuật hoặc lý do khác. Chúng tôi sẽ thông báo cho Bạn khi đây là trường hợp. Sau đó, bạn nên xóa hiện tại của mình') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Tài khoản và mở một tài khoản mới.') }}
    </p>
    <p>
        {{ __('Xin lưu ý rằng việc chỉnh sửa thông tin từ') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Tài khoản, tức là những thay đổi Bạn đã thực hiện đối với bất kỳ thông tin nào, sẽ tự động áp dụng cho tất cả các trang web được liên kết với Tài khoản') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('và danh tính đó.') }}
    </p>

    <h3 id="section-VII">
        VII. {{ __('Trẻ em và trẻ vị thành niên') }}
    </h3>
    <p>
        {{ __('Chúng tôi hiểu tầm quan trọng của việc thực hiện các biện pháp phòng ngừa bổ sung để bảo vệ quyền riêng tư và sự an toàn của trẻ em khi sử dụng Trang web và Dịch vụ của chúng tôi. Trẻ em dưới 13 tuổi, hoặc độ tuổi tối thiểu tương đương trong phạm vi quyền hạn có liên quan, không được phép tự tạo') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('tài khoản, trừ khi cha mẹ hoặc người giám hộ hợp pháp của họ cung cấp sự đồng ý có thể kiểm chứng.') }}
    </p>
    <p>
        {{ __('Nếu Chúng tôi biết rằng Chúng tôi đã thu thập Thông tin Cá nhân của trẻ dưới 13 tuổi hoặc độ tuổi tối thiểu tương đương tùy thuộc vào khu vực tài phán mà không có sự đồng ý của cha mẹ hoặc người giám hộ hợp pháp của trẻ, Chúng tôi sẽ thực hiện các bước để xóa thông tin đó ngay khi có thể.') }}
    </p>
    <p>
        {{ __('Nếu Người dùng là trẻ vị thành niên, tức là dưới 18 tuổi, cha mẹ hoặc người giám hộ hợp pháp của họ có thể yêu cầu quyền truy cập, thay đổi hoặc xóa Thông tin Cá nhân mà Chúng tôi có hoặc từ chối cho phép tiếp nhận hoặc sử dụng thông tin bằng một lá thư gửi cho Chúng tôi tại') }} privacy@gamekafe.com.
    </p>
    <p>
        {{ __('Để bảo vệ quyền riêng tư và bảo mật của Người dùng, các bước hợp lý sẽ được thực hiện để xác minh danh tính của cha mẹ hoặc người giám hộ hợp pháp trước khi cấp quyền truy cập vào Thông tin cá nhân. Do đó, điều rất quan trọng là phải bao gồm, trong thư của Bạn, địa chỉ email của Bạn cũng như số điện thoại mà chúng tôi có thể liên lạc với bạn.') }}
    </p>

    <h3 id="section-VIII">
        VIII. {{ __('Quyền đối với thông tin cá nhân của bạn') }}
    </h3>
    <p>
        {{ __('Đối với tất cả Người dùng, vì Chúng tôi áp dụng luật của Hồng Kông, Pháp lệnh Dữ liệu Cá nhân (Quyền riêng tư), Cap. 486, cung cấp cho Bạn một số quyền nhất định đối với Thông tin Cá nhân của Bạn, chẳng hạn như quyền truy cập, thay đổi và xóa dữ liệu Bạn đã cung cấp cho Chúng tôi. Nếu Bạn thay đổi bất kỳ thông tin nào của Bạn, Chúng tôi có thể giữ một bản sao thông tin mà Bạn đã cung cấp cho Chúng tôi ban đầu trong kho lưu trữ của Chúng tôi để sử dụng trong Chính sách này. Thông tin của bạn sẽ bị xóa theo yêu cầu của bạn bất cứ lúc nào bằng cách liên hệ với chúng tôi.') }}
    </p>
    <p>
        {{ __('Đối với Người dùng ở EU, Chính sách quyền riêng tư của chúng tôi hoàn toàn tuân thủ Quy định bảo vệ dữ liệu chung (GDPR), cụ thể là:') }}
    </p>
    <ul>
        <li>
            {{ __('Bạn được thông báo về tất cả các loại Thông tin Cá nhân mà Chúng tôi nắm giữ, nguồn gốc của thông tin đó, Chúng tôi chia sẻ thông tin đó với ai, Chúng tôi làm gì với thông tin đó và Chúng tôi sẽ lưu giữ thông tin đó trong bao lâu') }}
        </li>
        <li>
            {{ __('Chúng tôi đã giải thích những nơi Chúng tôi lưu giữ Thông tin Cá nhân và cách dữ liệu lưu chuyển giữa chúng') }}
        </li>
        <li>
            {{ __('Chúng tôi có Chính sách quyền riêng tư có thể truy cập công khai, phác thảo tất cả các quy trình liên quan đến Dữ liệu cá nhân') }}
        </li>
        <li>
            {{ __('Chúng tôi đã cung cấp cơ sở hợp pháp để giải thích lý do tại sao Chúng tôi cần xử lý Thông tin cá nhân') }}
        </li>
        <li>
            {{ __('Chúng tôi đã chỉ định một Nhân viên bảo vệ dữ liệu (DPO) mà Bạn có thể liên hệ bằng cách gửi email đến địa chỉ được cung cấp trong phần “Liên hệ với chúng tôi”') }}
        </li>
        <li>
            {{ __('Những người ra quyết định của chúng tôi hoàn toàn nhận thức được các nguyên tắc GDPR') }}
        </li>
        <li>
            {{ __('Bảo mật kỹ thuật của chúng tôi được cập nhật') }}
        </li>
        <li>
            {{ __('Tất cả nhân viên của chúng tôi đều nhận thức được việc bảo vệ dữ liệu') }}
        </li>
        <li>
            {{ __('Chúng tôi sẽ báo cáo vi phạm Dữ liệu cá nhân trong vòng 72 giờ cho chính quyền địa phương') }}
        </li>
        <li>
            {{ __('Chúng tôi có hợp đồng với tất cả các bộ xử lý dữ liệu mà Chúng tôi chia sẻ dữ liệu với') }}
        </li>
        <li>
            {{ __('Bạn có thể dễ dàng truy cập và cập nhật Thông tin cá nhân của mình') }}
        </li>
        <li>
            {{ __('Chúng tôi tự động xóa dữ liệu mà Chúng tôi không còn sử dụng nữa') }}
        </li>
        <li>
            {{ __('Bạn có thể dễ dàng yêu cầu Chúng tôi xóa hoặc ngừng xử lý Dữ liệu Cá nhân của Bạn') }}
        </li>
        <li>
            {{ __('Khi có liên quan đến Dữ liệu Cá nhân của trẻ em, Chúng tôi thực hiện các bước hợp lý để xác minh tuổi của chúng và xin phép cha mẹ hoặc người giám hộ hợp pháp của chúng và') }}
        </li>
        <li>
            {{ __('Chúng tôi thường xuyên xem xét các chính sách để biết các thay đổi, tính hiệu quả, các thay đổi trong cách xử lý dữ liệu và các thay đổi đối với tình trạng công việc của các quốc gia khác mà dữ liệu chuyển đến.')}}
        </li>
    </ul>
    <p></p>

    <h3 id="section-IX">
        IX. {{ __('Liên hệ với chúng tôi') }}
    </h3>
    <p>
        {{ __('Nếu Bạn có bất kỳ câu hỏi, thắc mắc, nhận xét hoặc yêu cầu nào, Chúng tôi rất sẵn lòng tiếp nhận và trả lời chúng. Xin vui lòng liên hệ với chúng tôi bằng cách gửi email tại') }} <a href="mailto:privacy@gamekafe.com">privacy@gamekafe.com</a>.
    </p>
</div>
@endsection
