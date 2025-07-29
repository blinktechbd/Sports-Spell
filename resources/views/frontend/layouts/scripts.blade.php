<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- language --}}
{{-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"> --}}
</script>
<script>
    // tooltip message
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // online vote poll
    $(document).on('click', '.vote-polling', function() {
        let optionId = $(this).val();
        let token = $(this).data('token');
        $.ajax({
            url: '{{ route('vote.submit') }}',
            method: 'POST',
            data: {
                _token: token,
                option_id: optionId
            },
            success: function(response) {
                if (response.success) {
                    $('#voteMessage' + response.id).text(response.message);
                    setTimeout(() => location.reload(), 2000);
                }
            },
            error: function() {
                $('#voteMessage').text("ভোট প্রদান ব্যর্থ হয়েছে। আবার চেষ্টা করুন।");
            }
        });
    });

    // ajker vote polling
    $(document).on('click', '.ajker-vote-polling', function() {
        let optionId = $(this).val();
        let token = $(this).data('token');

        $.ajax({
            url: '{{ route('ajkerSportVote.submit') }}',
            method: 'POST',
            data: {
                _token: token,
                option_id: optionId
            },
            success: function(response) {
                if (response.success) {
                    $('#ajkerSport-voteMessage' + response.id).text(response.message);
                    setTimeout(() => location.reload(), 2000);
                }
            },
            error: function() {
                $('#ajkerSport-voteMessage').text("ভোট প্রদান ব্যর্থ হয়েছে। আবার চেষ্টা করুন।");
            }
        });
    });
</script>
{{-- <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'bn',
                includedLanguages: 'en,bn',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            },
            'google_translate_element'
        );
    }
</script> --}}
{{-- scrol to top --}}
<script>
    window.onscroll = function() {
        const btn = document.getElementById("scrollTopBtn");
        btn.style.display = (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) ?
            "block" :
            "none";
    };

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>

@stack('appendJavascripts')
