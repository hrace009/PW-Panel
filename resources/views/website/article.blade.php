<x-hrace009::layouts.blog-single>
    <x-slot name="title">
        {{ config('pw-config.server_name') . ' | ' . $article->title }}
    </x-slot>

    <x-slot name="description">
        {{ $article->description }}
    </x-slot>

    <x-slot name="keywords">
        {{ $article->keywords }}
    </x-slot>

    <x-slot name="author">
        {{ ucwords($user->findOrFail($article->author)->truename)  }}
    </x-slot>

    <x-slot name="og_image">
        {{ asset('uploads/og_image/' . $article->og_image) }}
    </x-slot>

    <x-slot name="og_url">
        {{ route('show.article', $article->id ) }}
    </x-slot>

    <x-slot name="article_title">
        {{ $article->title }}
    </x-slot>

    <x-slot name="published">
        {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('j F, Y') }}
    </x-slot>

    <x-slot name="categories">
        {{ __('news.category.' . $article->category) }}
    </x-slot>

    <x-slot name="news">
        {!! $article->content !!}
    </x-slot>

    <x-slot name="article_id">
        {{ $article->id }}
    </x-slot>

    <x-slot name="widget">
        <x-hrace009::portal.widget />
    </x-slot>
</x-hrace009::layouts.blog-single>
