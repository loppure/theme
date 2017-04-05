{{ $args['before_widget'] }}

{{ $args['before_title'] }} {{ $title }} {{ $args['after_title'] }}

<ul>
    @foreach( $archives as $archive )
        <li class="archive-item">
            <a href="{{ $archive->url }}" title="Archivio per il mese di {{ $archive->month }}">
                {{ $archive->month }}
            </a>
        </li>
    @endforeach
</ul>

{{ $args['after_widget'] }}
