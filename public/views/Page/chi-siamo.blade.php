@extends('layout')

@section('content')

<div class="site-content page-standard">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>


	<section class="section-page">
		<article class="card-chi-siamo chi-siamo">
			<!-- presentazione chi siamo
			estensione quadrato 50% -->
			<header>
				<h3>Chi siamo</h3>
			</header>
		</article>
		<article class="card-chi-siamo numeri">
			<!-- presentazione numeri social sito componenti articoli scritti
			estensione quadrato 25% -->
			<header>
				<h3>Numeri</h3>
			</header>
		</article>
		<article class="card-chi-siamo rassegna-stampa">
			<!-- presentazione rassegna stampa
			estensione quadrato 25% -->
			<header>
				<h3>Rassegna stampa</h3>
			</header>
		</article>
		<article class="card-chi-siamo formazione">
			<!-- presentazione formazione
			estensione quadrato 50% -->
			<header>
				<h3>La nostra formazione</h3>
			</header>
		</article>
		<article class="card-chi-siamo eventi">
			<!-- presentazione eventi
			estensione quadrato 50% -->
			<header>
				<h3>I nostri eventi</h3>
			</header>
		</article>
		<article class="card-chi-siamo promozione">
			<!-- presentazione promozione
			estensione quadrato 50% -->
			<header>
				<h3>Promozione città</h3>
			</header>
		</article>
		<article class="card-chi-siamo progetti">
			<!-- presentazione associazione
			estensione quadrato 25% -->
			<header>
				<h3>Associazione</h3>
			</header>
		</article>
		<article class="card-chi-siamo presentazione">
			<!-- presentazione presentazione
			estensione quadrato 25% -->
			<header>
				<h3>Scarica presentazione</h3>
			</header>
		</article>
	</section>


</div>
@endsection
