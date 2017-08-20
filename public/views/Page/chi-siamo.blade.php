@extends('layout')

@section('content')

<div class="site-content page-standard">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>

	<section>
		<!-- TODO prima sezione chi siamo - presentazione -->
		<div class="presentazione">
			<p>
				L’oppure è il nuovo modo di vivere il territorio, un progetto giovane
				e dinamico che si pone l’obiettivo di raccontare il patrimonio culturale,
				storico, artistico ed enogastronomico delle nostre terre.
				L’arte, il cinema, la musica e la letteratura sono alcuni dei protagonisti
				di questo racconto, assieme ai festival e alle manifestazioni che animano
				le città in cui L’oppure è presente.
				Operiamo con passione e creatività, cercando sempre di fornire contenuti
				di qualità con uno stile fresco e innovativo.
			</p>
		</div>
	</section>

	<section>
		<!-- TODO seconda sezione chi siamo - numeri realtà -->
	</section>

	<section>
		<!-- TODO terzo sezione chi siamo - punti presentazione -->
		<article>
			<h6>Il nostro sguardo</h6>
			<figure></figure>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit,
				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
				aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
				velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
				sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</article>

		<article>
			<h6>Eventi</h6>
			<figure></figure>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit,
				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
				aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
				velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
				sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</article>

		<article>
			<h6>Lavoro con le scuole</h6>
			<figure></figure>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit,
				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
				aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
				velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
				sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</article>


		<article>
			<h6>Progetti</h6>
			<figure></figure>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit,
				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
				aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
				velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
				sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</article>
	</section>

	<section class="content-box-slim">
		<!-- Quarta sezione chi siamo - call di chi siamo -->

		<div class="box-slim associazione">
			<a href="{{the_permalink()}}/associazione"> Associazione</a>
		</div>

		<div class="box-slim informativa">
			<a href="{{the_permalink()}}/informativa"> Informative</a>
		</div>

	</section>


</div>
@endsection
