<div class="widget-item timeline">
    <h6>Gli ultimi mesi</h6>

    <ul>
        @foreach ($archives as $month)
            <li class="item archive-item">
          <a href="{{ $month->url }}" title="Archivio per il mese di {{ $month->month }}">
                    {{ $month->month }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="content-button-widget">
        <!-- TODO PAGE ARCHIVIO TUTTI ARTICOLI <a class="button" href="#" title="Pagina archivio">
            Archivio
        </a> -->
    </div>
</div>
