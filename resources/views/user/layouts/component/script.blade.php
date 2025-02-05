<script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/countdown.js') }}"></script>


<script>
    // Hiển thị vòng xoay khi bắt đầu tải hoặc chuyển trang
    function showLoader() {
        document.getElementById('loading-spinner').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    // Ẩn vòng xoay khi tải xong hoặc chuyển trang xong
    function hideLoader() {
        document.getElementById('loading-spinner').style.display = 'none';
        document.body.style.overflow = '';
    }

</script>

<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('librarys/library.js') }}"></script>
<script src="{{ asset('librarys/cart.js') }}"></script>
<script src="{{ asset('librarys/checkout.js') }}"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
    window.onbeforeunload = function() {
        showLoader(); // Hiển thị vòng xoay khi rời khỏi trang
    };
    // Ẩn vòng xoay khi trang được tải lại từ bộ nhớ cache của trình duyệt
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) { // Kiểm tra xem trang có được tải từ cache hay không
            hideLoader(); 
        }
    });
</script>

{{-- chat box AI --}}
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="TuneNests"
  agent-id="f59cb04a-1fc0-4c79-ab47-e0f8d087a61e"
  language-code="vi"
></df-messenger>


@stack('scripts')

