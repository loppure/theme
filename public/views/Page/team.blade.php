@extends('layout')

@section('content')

<div class="page-gray page-standard">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>
	<section class="content-author">

		<article class="card-author" style="background-image: url(#);">
			<h3>Nome e cognome</h3>
			<span>Pordenone</span>
		</article>

	</section>
</div>
@endsection
