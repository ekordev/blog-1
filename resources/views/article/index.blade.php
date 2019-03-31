@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <img src="https://checkon.tech/assets/home.png" alt="" style="max-width:100%;height:auto;">

        <h3>{{ config('blog.article.title') }}</h3>

        <h6>{{ config('blog.article.description') }}</h6>
    @endcomponent

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection
