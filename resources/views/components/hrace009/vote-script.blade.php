<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script>
    $('[data-countdown]').each(function () {
        var $this = $(this), finalDate = $(this).data('countdown');
        seconds = new Date().getTime() + (finalDate * 1000);
        $this.countdown(seconds, function (event) {
            $this.html(event.strftime(
                "<span class=\"text-4xl\" >%-H</span> {{ __( 'vote.time.hours' ) }}"
                + " <span class=\"text-4xl\" >%-M</span> {{ __( 'vote.time.minutes' ) }}"
                + " <span class=\"text-4xl\" >%-S</span> {{ __( 'vote.time.seconds' ) }}"
            ));
        })
            .on('finish.countdown', function (event) {
                $(this).html("{{ __( 'vote.cooldown_done' ) }}}");
                location.reload();
            });
    });
</script>
