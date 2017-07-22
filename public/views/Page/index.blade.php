@extends('layout')

@section('content')

<div class="page-gray page-standard">
    <header class="header-page">
        <h1 class="title-page">{{ $title }}</h1>
    </header>
    <section class="content-page-text">
        {{ $content }}
    </section>
</div>

@endsection
