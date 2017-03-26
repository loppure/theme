@extends('layout')

@section('content')

<div class="page-gray page-standard">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>
	<section class="content-contanti">

		<article class="box-rettangolo-3">
			<div class="card-contatti">
				<h3>Hai bisogno di informazioni?</h3>
				<span>Per qualsiasi tipo di informane</span>
				<a href="#">info@loppure.it</a>
			</div>
		</article>

		<article class="box-rettangolo-3">
			<div class="card-contatti">
				<h3>Vuoi entrare ne L'oppure</h3>
				<span> Entrare far parte del team de L'oppure</span>
				<a href="#">primopasso@loppure.it</a>
			</div>
		</article>

		<article class="box-rettangolo-3">
			<div class="card-contatti">
				<h3>Vuoi collaborare con L'oppure</h3>
				<span> Organizzazione di iniziatie, eventi e molto altro </span>
				<a href="#">primopasso@loppure.it</a>
			</div>
		</article>
	</section>

	<section class="content-local">
		<h3>Noi siamo qui</h3>
		<a href="#">Via delle Valli, 2, 33081 Aviano PN</a>
	</section>

	<section class="content-social">
		@include('Widget/Social/seguici/index')
	</section>
</div>

@endsection
