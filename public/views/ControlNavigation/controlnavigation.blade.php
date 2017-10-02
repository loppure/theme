<div class="content-col-servizi">
  <ul>
    <li class="col-servizi promozione"  data-tab="promozione">
      <button>Promozione</button>
    </li>
    <li class="col-servizi progetti" data-tab="progetti">
      <button>Progetti</button>
    </li>
    <li class="col-servizi eventi" data-tab="eventi">
      <button>Eventi</button>
    </li>

  </ul>
</div>

<div class="content-contenuto-servizi">
  <div id="promozione" class="contento-servizio">
    <button class="close-servizi">X</button>
    <ul class="lista-tipi-promozione">
      <li>
        <h4><a href="{{ esc_url( home_url( '/rubriche' )) }}/gusti-della-terra">Gusti della terra</a></h4>
      </li>
      <li>
        <h4><a href="{{ esc_url( home_url( '/rubriche' )) }}/voli-sul-territorio">Voli sul terriotorio</a></h4>
      </li>
      <li>
        <h4><a href="{{ esc_url( home_url( '/rubriche' )) }}/radici-nel-tempo">Radici nel tempo</a></h4>
      </li>
      <li>
        <h4><a href="{{ esc_url( home_url( '/rubriche' )) }}/parole-nostre">A parole nostre</a></h4>
      </li>
    </ul>
  </div>
  <div id="progetti" class="contento-servizio">
    <button class="close-servizi">X</button>
    <ul class="lista-tipi-progetti">
      <li>Racconti di Erasmus</li>
      <li>Racconto personaggi</li>
      <li>Rubriche generiche</li>
    </ul>
  </div>
  <div id="eventi" class="contento-servizio">
    <button class="close-servizi">X</button>
    <article>
      <!-- Card degli ultimi 3 eventi-->
    </article>
  </div>
</div>
