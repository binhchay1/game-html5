@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Chính sách') }}</title>
@endsection

@section('content')
<div class="white-box-bg box body static" style="padding: 25px; text-align: justify;">
    <div class="title-container">
        <h1 class="header-5">Privacy Policy</h1>
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
            {{ __('if You are logged in to') }} {{ ('env('APP_NAME', 'Gamekafe')') }} {{ __('Account, Your User ID.') }}
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
        We are incorporated and headquartered in Hong Kong. However, Our login system is hosted by servers in the Netherlands. Personal information may be accessed by Us or transferred to Us in the Netherlands or to Our affiliates, business partners or service providers located elsewhere in the world. By providing Us with information We receive about You, You consent to such transfer. We will use our best endeavors to protect the privacy and security of this information according to Our Privacy Policy, regardless of where it is processed or stored.
    </p>

    <h3 id="section-III">
        III. Our Websites and other websites
    </h3>

    <h4>
        (a) About Our Websites
    </h4>
    <p>
        Our Websites use a single-login system that let You connect among the Websites, including games and social interaction. In this way, We can provide You with a personalized experience on the Websites.
    </p>
    <p>
        You are reminded that the links contained or included in Our Websites and Services may direct You to third party websites and they are created and maintained by other businesses and developers who are not part of the Company, so it is important that You read their terms of service and privacy policies as this is Your responsibility.
    </p>

    <h4>
        (b) Logging in to another website using Gamekafe Account
    </h4>
    <p>
        In some circumstances, You may be able to log into third party websites using Gamekafe Account identity. This means that You have the possibility to use the default Gamekafe Account identities or create new ones to log in to third party websites. You can determine under which identity You want to access third party websites. When You log in using Gamekafe Account, Your account information will never be transferred to the third party website without Your consent (Section II (c)). In order for third party websites to uniquely identify Your account among other accounts, We send a unique identifier named ‘PID’ (personal identification). Your PID is different for each third party website so as to preserver your anonymity.
    </p>
    <p>
        Be aware that there is a probability that third party websites, games or services may require from You different information than the one in the fields you have chosen to fill for Your Gamekafe Account identity. For instance, You have filled in Your name and country but the third party website requires You to provide Your nickname as well. The extra information required may vary from one third party website, game or service to another. Once you do so, the extra information provided will be automatically added to the identity you have accessed that website with. As a result, all the websites linked to that identity will also benefit from that additional information. Nonetheless, You are able to view which third party website has access to which information You provided by going on the “Sites” section of Your Gamekafe Account.
    </p>
    <p>
        If You already have an account on a third party website, that website may also allow You to connect and link it to Your Gamekafe Account. Your information will be sent to Us when You use Your Gamekafe Account to register or login to a third party website.
    </p>

    <h4>
        (c) Privacy Practices of Third Parties
    </h4>
    <p>
        This privacy statement only addresses the use and disclosure of information by Us through Your interaction with Our Websites and Services. Other websites that may be accessible from Our Websites may have their own privacy statements and Personal Information collection, use and disclosure practices. For instance, and purely as an example, some websites require an over eighteen (18) years of age access.
    </p>
    <p>
        We are not responsible for the privacy policies, practices or content of Third party websites. Please be advised that the practices described in this Privacy Policy do not apply to information gathered through other websites. When You leave the Website, the privacy policies and practices of that other website apply; We encourage You to be aware of those privacy policies and practices when You are on those other websites and submitting personally identifiable information. You are responsible for reviewing the privacy policies and practices of each and every site that You visit.
    </p>

    <h3 id="section-IV">
        IV. Cookies and other technologies
    </h3>
    <p>
        Our Websites and Service may use cookies and other technologies. This collection of data is used for statistical analysis about Our Websites for analytical purposes. These technologies help Us better understand user behavior, tell Us which parts of Our Websites people have visited, and facilitate and measure the effectiveness of advertisements and web searches. We treat information collected by cookies and other technologies as non‑personal information.
    </p>
    <p>
        Any information shared or known to Us will not and cannot be used to identify Your identity as they are non-specific. They are merely mathematical or analytical data about Our visitors and their use on Our Websites. The data does not give out any personal details. Cookies may be used to gather this general internet data. When used, cookies are downloaded to Your computer without prompting. The cookie file is stored on Your hard drive, where files are transferred to. This information helps Us improve Our Websites and services provided to You. If you want to disable cookies, please consult the relevant guidelines of the browser that You use and adjust the relevant browser settings. Please note that some features of the Websites may not be available once cookies are disabled.
    </p>
    <p>
        Due to the communication standards on the Internet, when You visit the Website We automatically receive the URL of the site from which You came and the site to which You are going when You leave the Website. We also receive Internet Protocol (IP) addresses, browser type and language, Internet service provider (ISP), referring and exit websites and applications, operating system, date/time stamp, and clickstream data.
    </p>
    <p>
        We use this information to understand and analyze trends, to administer the site, to learn about user behavior on the site, to improve Our Service, and to gather demographic information about Our user base as a whole. We may use this information for marketing and advertising purposes. The link between Your IP address and Your personally identifiable information is not shared with third parties without Your permission.
    </p>

    <h3 id="section-V">
        V. Protection of Personal Information
    </h3>
    <p>
        We take the security of your Personal Information very seriously. We work hard to protect the Website and Our users from unauthorized access, alteration, disclosure or destruction of information within Our control.
    </p>
    <p>
    </p>
    <p>
        In particular:
    </p>
    <ul>
        <li>
            We encrypt many of Our services using Secure Sockets Layer (SSL)
        </li>
        <li>
            We review Our information collection, storage and processing practices, including physical security measures, to guard against unauthorized access to systems.
        </li>
        <li>
            We restrict access to Personal Information to the Company’s employees, contractors and agents who need to know that information in order to process it for Us, and who are subject to contractual confidentiality obligations and may be disciplined or terminated if they fail to meet these obligations.
        </li>
    </ul>
    <p></p>
    <p>
        Data you provide Us with will be stored on secure servers. We take all reasonable steps to ensure the safety of the data transfer in agreement with this Policy. Transmission of data via the Internet is never completely secure, thus a guarantee of data sent electronically or transmitted cannot be given. Information offered is therefore at Your own risk.
    </p>
    <p>
        We use a reasonably secure method to destroy Personal Information.
    </p>

    <h3 id="section-VI">
        VI. Accessing and changing your Personal Information
    </h3>
    <p>
        You can access and change any Personal Information You provided to Us in registration through Your Gamekafe Account page. For a complete set of copy of Personal Information we have about You, it will be provided, free of charge, within a reasonable period of time and in any event no later than 14 days after We received a written request from You. We might need to verify that You are in fact the data subject before We can proceed with such a request.
    </p>
    <p>
        Sometimes We may not be able to process a request to change your Personal Information due to technical or other reasons. We will inform You when this is the case. You are then advised to delete Your current Gamekafe Account and open a new one.
    </p>
    <p>
        Please note that correcting information from Your Gamekafe Account, i.e. changes You have made to any information, will automatically apply to all the linked websites to that Gamekafe Account and identity.
    </p>

    <h3 id="section-VII">
        VII. Children and minors
    </h3>
    <p>
        We understand the importance of taking extra precautions to protect the privacy and safety of children using Our Websites and Services. Children under the age of 13, or equivalent minimum age in the relevant jurisdiction, are not permitted to create their own Gamekafe Account, unless their parent or legal guardian provided verifiable consent.
    </p>
    <p>
        If We learn that We have collected the Personal Information of a child under 13, or equivalent minimum age depending on jurisdiction, without his/her parent’s or legal guardian’s consent, We will take steps to delete the information as soon as possible.
    </p>
    <p>
        If the User is a minor, i.e. under the age of 18, his/her parent or legal guardian can request access, change or delete of the Personal Information We have, or refuse to allow any further reception or use of the information by a written letter to Us at privacy@Gamekafe.com.
    </p>
    <p>
        In order to protect the Users’ privacy and security, reasonable steps will be taken to verify the parent’s or legal guardian’s identity before granting access to the Personal Information. Therefore, it is very important to include, in Your letter, Your email address as well as a telephone number where we can reach you.
    </p>

    <h3 id="section-VIII">
        VIII. Rights to Your Personal Information
    </h3>
    <p>
        For all Users, since We adopt the laws of Hong Kong, the Personal Data (Privacy) Ordinance, Cap. 486, provides You with certain rights to Your Personal Information, such as the right to access, change and delete the data You provided to Us. If You change any of Your information, We may keep a copy of the information that You originally provided to Us in Our archives for uses documented in this Policy. Your information will be deleted upon Your request at any time by contacting Us.
    </p>
    <p>
        For EU-based Users, Our Privacy Policy fully complies with the General Data Protection Regulation (GDPR), in particular:
    </p>
    <ul>
        <li>
            You are informed of all types of Personal Information We hold, the source of that information, who We share it with, what We do with it and how long We will keep it;
        </li>
        <li>
            We explained places where We keeps Personal Information and the ways data flows between them;
        </li>
        <li>
            We have a publicly accessible Privacy Policy that outlines all processes related to Personal Data;
        </li>
        <li>
            We have provided a lawful basis to explain why We need to process Personal Information;
        </li>
        <li>
            We have appointed a Data Protection Officer (DPO) in which You can contact by sending an email to the address provided in the “Contacting Us” section;
        </li>
        <li>
            Our decision makers are fully aware of the GDPR guidelines;
        </li>
        <li>
            Our technical security is up to date;
        </li>
        <li>
            All of Our staff are aware of data protection;
        </li>
        <li>
            We will report Personal data breaches within 72 hours to the local authority;
        </li>
        <li>
            We have a contract with all data processors that We share the data with;
        </li>
        <li>
            You can easily access and update Your Personal Information;
        </li>
        <li>
            We automatically delete data that We no longer has any use for;
        </li>
        <li>
            You can easily request Us to delete or stop processing Your Personal Data;
        </li>
        <li>
            When children's Personal Data are involved, We take reasonable steps to verify their age and ask consent from their parent or legal guardian; and
        </li>
        <li>
            We regularly review policies for changes, effectiveness, changes in handling of data and changes to the state of affairs of other countries the data flows to.
        </li>
    </ul>
    <p></p>

    <h3 id="section-IX">
        IX. Contacting Us
    </h3>
    <p>
        If You have any questions, queries, comments, or requests, We are happy to receive and answer them. Please feel free to contact Us by sending an email at <a href="mailto:privacy@gamekafe.com">privacy@gamekafe.com</a>.
    </p>
</div>
@endsection
