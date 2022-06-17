<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    function showEmpty() {
        const Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            animation: true,
            html: '{!! __('donate.error.message', ['currency' => config('pw-config.currency_name') ]) !!}',
        })
    }

    function showMinimum() {
        const Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            animation: true,
            title: '{{ __('donate.error.minimum', ['min' => config('pw-config.payment.paypal.minimum') ]) }}',
        })
    }

    function donation_check() {
        dollar_minimum = "{{ config('pw-config.payment.paypal.minimum') }}";
        dollars_paypal = $('#donation_tokens').val();
        dollars = $('#donation_dollars').val();
        if (dollars == null || dollars === "" || dollars_paypal == null || dollars_paypal === "") {
            window.onload = showEmpty();
            return false;
        } else if (parseFloat(dollars) < dollar_minimum || parseFloat(dollars_paypal) < dollar_minimum) {
            window.onload = showMinimum();
            return false;
        } else {
            return true;
        }
    }

    function format_number(field_id, decimal_places) {
        const field = $("#" + field_id);
        const new_val = Math.round(field.val() * Math.pow(10, decimal_places)) / Math
            .pow(10, decimal_places);
        if (parseFloat(new_val) !== parseFloat(field.val()) || (field.val().charAt(0) === "0" && field.val().charAt(field.val().length - 1) !== ".")) {
            field.val(new_val);
        }
    }

    $(function () {
        const per_USD = "{{ config('pw-config.payment.paypal.currency_per') }}";
        const double_donation = "{{ config('pw-config.payment.paypal.double') }}";
        $("#donation_dollars").on('input', function () {
            format_number("donation_dollars", 0);
            $("#donation_tokens").val($("#donation_dollars").val() * (double_donation ? per_USD * 2 : per_USD));
            format_number("donation_tokens", 0);
        });
        $("#donation_tokens").on('input', function () {
            format_number("donation_tokens", 0);
            $("#donation_dollars").val($("#donation_tokens").val() / (double_donation ? per_USD * 2 : per_USD));
            format_number("donation_dollars", 2);
        });
    });
</script>
