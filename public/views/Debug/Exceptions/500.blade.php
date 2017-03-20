@extends('layout')

@section('content')

    @if ( $debug )

        <h1>Si è verificata una eccezione :(</h1>
        <p>Ecco l'errore nel suo intero:</p>
        <pre><code><?= var_dump( $exception ); ?></code></pre>

    @else

        <h1>Errore</h1>
        <p>Si è vericato un errore nel server.</p>
        <p>Ci scusiamo per il disagio, rimedieremo al più presto.</p>

    @endif
@endsection
