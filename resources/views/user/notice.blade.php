@extends('layouts.user')

@section('title', 'お知らせ')

@section('content')

<a href="javascript:history.back()" class="back-link">
    ←戻る
</a>

<div class="notice-container">

    <p class="notice-date">
        {{ \Carbon\Carbon::parse($article->posted_date)->format('Y年n月j日') }}
    </p>

    <h1 class="notice-title">
        {{ $article->title }}
    </h1>

    <div class="notice-body">
        {!! nl2br(e($article->article_contents)) !!}
    </div>

</div>

@endsection