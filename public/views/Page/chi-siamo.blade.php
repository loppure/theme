@extends('layout')

@section('content')

<div class="page-gray page-standard">
	<header class="header-page">
		<h1 class="title-page">{{ the_title() }}</h1>
	</header>

	<section class="content-presentazione">

		<div class="presentazione">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
				sed do eiusmod tempor incididunt ut labore et dolore magna
				aliqua. Ut enim ad minim veniam, quis nostrud exercitation
				ullamco laboris nisi ut aliquip ex ea commodo consequat.
				Duis aute irure dolor in reprehenderit in voluptate velit
				esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
				occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum.
			</p>
		</div>

		<div class="payoff">
			<span>Uno sgurardo sulla tua città, ovunque ti trovi</span>
		</div>

	</section>
	<section class="content-button-chi-siamo">
		<div class="box-rettangolo-3 documento">
			<a href="#"> Scarica la presentazione</a>
		</div>

		<div class="box-rettangolo-3 associazione">
			<a href="{{the_permalink()}}/associazione"> Associazione</a>
		</div>

		<div class="box-rettangolo-3 informativa">
			<a href="{{the_permalink()}}/informativa"> Informative</a>
		</div>
	</section>

</div>
@endsection
