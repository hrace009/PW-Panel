<!-- GM Status -->
<div class="side-block">
    <h4 class="block-title">{{ __('widget.table.gmonline') }}</h4>
    <ul class="block-content">
        @if ( count( $gms ) > 0 )
            @foreach( $gms as $gm )
                <li>{{ $gm->truename }} <span class="badge {{ $gm->online() ? 'bg-success' : 'bg-danger' }}" style="float: right">{{ $gm->online() ? __('widget.table.field.online') : __('widget.table.field.offline') }}</span></li>
            @endforeach
        @else
            <span>{{ __('widget.nogm.titel') }}</span>
            <span>{{ __('widget.nogm.text') }}</span>
        @endif
    </ul>
</div>
<!-- /GM Status -->
<!-- Status Server -->
<div class="side-block">
    <h4 class="block-title">{{ __('widget.table.server_status') }}</h4>
    <div class="block-content">
        {{ __('widget.server_time') }}
        <span class="label label-default" style="float: right;">{{ \Carbon\Carbon::now(config('app.timezone'))->translatedFormat('j M, Y H:i') }}</span>
    </div>
    <div class="block-content">
        {{ __('widget.table.field.status') }}
        <span class="badge {{ ( $api->online ? 'bg-success' : 'bg-danger') }}" style="float: right;">{{ ($api->online ? __('widget.table.field.online') : __('widget.table.field.offline')) }}</span>
    </div>
    <div class="block-content">
        {{ __('widget.players_online') }}
        <span class="badge {{ (count($api->getOnlineList()) > 0 ? 'bg-success' : 'bg-danger') }}"
              style="float: right;">{{ $api->online ? count($api->getOnlineList()) : 0 }}</span>
    </div>
    <div class="block-content">
        {{ __('widget.total_account') }}
        <span class="badge {{ ($totalUser > 0 ? 'bg-success' : 'bg-danger') }}"
              style="float: right;">{{ $totalUser }}</span>
    </div>
</div>
<!-- /Server Time -->
<!-- News Category -->
<div class="side-block">
    <h4 class="block-title">{{ __('widget.table.category') }}</h4>
    <ul class="block-content">
        @foreach( __('news.category') as $key => $value )
            <a href="{{ route('show.article.by.category', $key ) }}">{{ $value }}</a>
        @endforeach
    </ul>
</div>
<!-- /News Category -->
