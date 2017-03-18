@extends('layout')

@section('content')

<div class="page-gray">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>
	<section class="content-contanti">

		<div class="box-rettangolo-3 card-contatti">
			<h3>Hai bisogno di informazioni?</h3>
			<a href="#">info@loppure.it</a>
		</div>

		<div class="box-rettangolo-3 card-contatti">
			<h3>Vuoi unirti al L'oppure</h3>
			<a href="#">primopasso@loppure.it</a>
		</div>
	</section>
	
	<section class="content-social">
		<h3>Seguici</h3>
		<span>@LoppureIT</span>
		<ul>
			<li>Facebook</li>
			<li>Twitter</li>
			<li>Instagram</li>
			<li>Telegram</li>
		</ul>
	</section>
</div>

@endsection
