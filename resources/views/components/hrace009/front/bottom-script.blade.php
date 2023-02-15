@livewireScripts
<x-hrace009::theme-script/>
<x-hrace009::flash-message/>
<x-hrace009::accordion-script/>
@if( request()->routeIs('news.create') || request()->routeIs('news.edit') || request()->routeIs('shop.create') || request()->routeIs('shop.edit') || request()->routeIs('article.create') || request()->routeIs('article.edit') )
    <x-hrace009::news-script/>
@endif
@include('popper::assets')
@if( request()->routeIs('admin.chat.watch') )
    <x-hrace009::chat-script/>
@endif
@if( request()->routeIs('app.donate.history') )
    <x-hrace009::history-script/>
@endif
@if( request()->routeIs('app.donate.paypal*') )
    <x-hrace009::paypal-script/>
@endif
@if( request()->routeIs('app.donate.ipaymu*') )
    <x-hrace009::ipaymu-script/>
@endif
@if( request()->routeIs('app.vote.index') )
    <x-hrace009::vote-script/>
@endif
