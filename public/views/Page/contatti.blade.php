@extends('layout')

@section('content')

<div class="page-gray page-standard">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>
	<section class="content-contatti">

		<article class="card-contatti">
			<h3>Hai bisogno di informazioni?</h3>
			<span>Per qualsiasi tipo di informane</span>
			<a href="mailto:info@loppure.it">info@loppure.it</a>
		</article>

		<article class="card-contatti">
			<h3>Vuoi entrare ne L'oppure</h3>
			<span> Entrare far parte del team de L'oppure</span>
			<a href="mailto:primopasso@loppure.it">primopasso@loppure.it</a>
		</article>
	</section>

	<section class="content-local">
		<a href="https://goo.gl/maps/2SrQkuw1csQ2">Via delle Valli, 2, 33081 Aviano PN</a>
	</section>

	<section class="content-social">
		@include('Widget/Social/seguici/index')
	</section>
</div>

@endsection
