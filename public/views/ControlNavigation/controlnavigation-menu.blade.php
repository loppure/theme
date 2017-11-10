<div class="contentuto-controll-navigation-menu" id="content-menu-navigation-cotrol">
  <div class="content-col-servizi-menu">
    <ul>
      <li class="col-servizi promozione"  data-tab="promozione-menu">
        <button>Promozione</button>
      </li>
      <li class="col-servizi progetti" data-tab="progetti-menu">
        <button>Progetti</button>
      </li>
      <li class="col-servizi eventi" data-tab="eventi-menu">
        <button>Eventi</button>
      </li>
      <li class="col-servizi espolora">
        <a href="#">Guarda le nostre città</a> <!-- TODO va indirizzato alla cartina con le città -->
      </li>
    </ul>
  </div>

  <div class="content-contenuto-servizi-menu">
    <div id="promozione-menu" class="contento-servizio visible">
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
    <div id="progetti-menu" class="contento-servizio">
      <button class="close-servizi">X</button>
      <ul class="lista-tipi-progetti">
        <li>Racconti di Erasmus</li>
        <li>Racconto personaggi</li>
        <li>Rubriche generiche</li>
      </ul>
    </div>
    <div id="eventi-menu" class="contento-servizio">
      <article>
        <!-- Card degli ultimi 3 eventi-->
      </article>
    </div>
  </div>
  <div class="content-ricerca">
    @include('shared.searchform')
  </div>
</div>
