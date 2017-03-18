@extends('layout')

@section('content')
	@if ( $debug )
		<h1>Si è verificato un errore :(</h1>
		<p>Ecco tutte le informazioni che sono riuscito a raccogliere</p>
		<table>
			<tr>
				<td>number</td>
				<td>{{ $number }}</td>
			</tr>
			<tr>
				<td>message</td>
				<td>{{ $message }}</td>
			</tr>
			<tr>
				<td>file</td>
				<td>{{ $file }}</td>
			</tr>
			<tr>
				<td>line</td>
				<td>{{ $line }}</td>
			</tr>
			<tr>
				<td>context</td>
				<td><pre><?php dump($context); ?></pre></td>
			</tr>
		</table>
	@else
		<h1>Si è verificato un errore nel server</h1>
		<p>Stiamo lavorando per sistemarlo.</p>
	@endif
@endsection
