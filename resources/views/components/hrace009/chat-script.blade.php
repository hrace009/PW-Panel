<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    $(function () {
        if ($('#live_chat tbody:empty')) {
            loadLogs();
        }
    });
    $("#chat_refresh").click(function () {
        loadLogs();
    });

    function loadLogs() {
        $('#chat_refresh').prop('disabled', true);
        $('#chat_refresh').html("{{ __('manage.loading') }}");
        $('#live_chat tbody').empty();
        $.ajax({
            method: 'post',
            url: '{{ route('admin.chat.postLogs') }}',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function (r) {
                for (var i = 0; i < r.length; i++) {
                    $('#live_chat tbody').append("<tr class='border-b dark:border-primary-light " + r[i].row_color + "'><td>" + r[i].date + "</td><td>" + r[i].uid + "</td><td>" + r[i].channel + "</td><td>" + r[i].dest + "</td><td>" + r[i].msg + "</td></tr>");
                }
                $("tbody.reverse").each(function (elem, index) {
                    var arr = $.makeArray($("tr", this).detach());
                    arr.reverse();
                    $(this).append(arr);
                });
                $("#chat_refresh").prop('disabled', false);
                $("#chat_refresh").html("<span class='icon-refresh'></span> {{ __('manage.buttons.refresh') }}");
            },
            error: function (e) {

            }
        });
    }
</script>
