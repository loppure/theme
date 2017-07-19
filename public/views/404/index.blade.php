@extends('layout')

@section('content')

<section class="page-error-404">
	<h1>Errore 404</h1>
	<span>Pagina non trovata</span>
	<p>Sei sicuro che stavi cercando proprio questo?<br/>
		forse stavi cercando altro!<p>
	<span>Riparti dalla Home</span>
	<div class="content-button">
		<a href="{{ esc_url( home_url( '/' )) }}" class="button">Home</a>
	</div>
</section>
<!-- Parte dedicata all'assistente -->
<!-- TODO <section>
	<h3>Nome dell'assistente</h3>
	<p>In qualsiasi parte del sito tu ti trovi riccordati che puoi
		fare affidamento su di lui nome assistente,
		ti fornirà immediatamente dove ti trovi e ti
		consiglierà rubriche o città da leggere. Oltre all'ultimo articolo</p>
		<span> Clicca sulla sua icona</span>

	</section> -->


@endsection
