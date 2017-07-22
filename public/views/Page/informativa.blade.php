@extends('layout')

@section('content')

<div class="page-gray page-standard">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>

	<section class="content-page-text">

		<article class="card-informativa">
			<h3>Informativa Cookie</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			</p>
			<div class="content-button">
				<a class="button">Approfondisci</a>
			</div>
		</article>

		<article class="card-informativa">
			<h3>Informativa sul uso dei contenti prodotti da L'oppure</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			</p>
		</article>

		<article class="card-informativa">
			<h3>Informativa sul uso del contenuto di terzi</h3>
			<p>
				I contenuti di questo sito sono realizzati da studenti e giovani
				appassionati del proprio territorio. Questo progetto non persegue
				nessuno scopo di lucro. Pertanto se sono presenti errori o imprecisioni
				vi preghiamo di contattarci: qualsiasi feedback ci è utile per migliorare.
				I contenuti testuali sono di proprietà dell'Associazione "L'oppure", ad eccezione
				delle citazioni o delle trascrizioni di testi altrui. Chi intenda utilizzarli per
				scopi non commerciali può farlo citando come fonte l'Associazione "L'oppure".
				Qualora si voglia riprodurli per scopi commerciali, vi preghiamo di contattarci
				alla mail info@loppure.it.
			</p>
		</article>

	<!-- TODO	<article>
			<h3>Informativa sulla privacy</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			</p>
			<a class="button">Approfondisci</a>
		</article> -->

	</section>

</div>
@endsection
