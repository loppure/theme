@extends('layout')

@section('content')

<div class="page-gray page-standard">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>

	<section>
		<h2>I nostri intenti</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
			nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			deserunt mollit anim id est laborum.
		</p>
	</section>

	<section class="content-direttivo">
		<h2>Direttivo</h2>
		<article>
			<img src="#">
			<span class="ruolo">Presidente</span>
			<h3>Mattia Carbone</h3>
		</article>

		<article>
			<img src="#">
			<span class="ruolo">Vice presidente</span>
			<h3>Mattia Carbone</h3>
		</article>

		<article>
			<img src="#">
			<span class="ruolo">Segretario</span>
			<h3>Mattia Carbone</h3>
		</article>

		<article>
			<img src="#">
			<span class="ruolo">Consigliere</span>
			<h3>Mattia Carbone</h3>
		</article>

		<article>
			<img src="#">
			<span class="ruolo">Consigliere</span>
			<h3>Mattia Carbone</h3>
		</article>

		<article>
			<img src="#">
			<span class="ruolo">Consigliere</span>
			<h3>Mattia Carbone</h3>
		</article>

		<article>
			<img src="#">
			<span class="ruolo">Consigliere</span>
			<h3>Mattia Carbone</h3>
		</article>

		<!-- TODO Custom field ripetitore -->
	</section>

	<section class="documenti-associazione">
		<h2>Documenti di fondazione</h2>

		<article>
			<a href="#">
				<h4>Titolo documento</h4>
			</a>
		</article>

		<!-- TODO Custom field ripetitore -->
	</section>

	<section class="documenti-bilancio">
		<h2>Bilancio</h2>

		<article>
			<a href="#">
				<h4>Titolo documento</h4>
			</a>
		</article>

		<!-- TODO Custom field ripetitore -->
	</section>

</div>
@endsection
