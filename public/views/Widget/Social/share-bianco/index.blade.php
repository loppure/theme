<div class="widget-share-social">
  <h3>Condividi</h3>
  <ul>
    <li class="item-social">
      <a href="http://www.facebook.com/sharer.php?u={{ the_permalink() }}" title="condividi su Facebook">
        <img src=" {{ get_template_directory_uri() }}/public/assets/src/img/icone-social/facebook.svg" />
      </a>
    </li>
    <li class="item-social">
      <a href="https://twitter.com/share?url={{ the_permalink() }}&amp;text=L'oppure,%20lo%20squardo%20sul%20territorio,%20ovvunque%20ti%20trovi&amp;hashtags=LoppureIT" title="condividi su Twitter">
        <img src=" {{ get_template_directory_uri() }}/public/assets/src/img/icone-social/twitter.svg" />
      </a>
      <!-- TODO rivedere il text -->
    </li>
    <li class="item-social">
      <a href="https://plus.google.com/share?url={{ the_permalink() }}" title="condividi su Google Plus">
        <img src=" {{ get_template_directory_uri() }}/public/assets/src/img/icone-social/google-plus.svg" />
      </a>
    </li>
    <li class="item-social">
      <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ the_permalink() }}" title="condividi su LinkedIn">
        <img src=" {{ get_template_directory_uri() }}/public/assets/src/img/icone-social/linkedin.svg" />
      </a>
    </li>
    <li class="item-social">
      <a href="whatsapp://send?text={{ the_permalink() }}" data-action="share/whatsapp/share" title="condividi tramite Whasthapp">
        <img src=" {{ get_template_directory_uri() }}/public/assets/src/img/icone-social/whatsapp.svg" />
      </a>
    </li>
    <li class="item-social">
      <a href="https://t.me/share/url?url={{ the_permalink() }}" title="condividi tramite Telegram">
        <img src=" {{ get_template_directory_uri() }}/public/assets/src/img/icone-social/telegram.svg" />
      </a>
    </li>
    <li class="item-social">
      <a href="mailto:?Subject=Uno sguardo de L'oppure&amp;Body=L'oppure,%20lo%20squardo%20sul%20territorio,%20ovvunque%20ti%20trovi%20 {{ the_permalink() }}" title="condividi tramite mail">
        <img src=" {{ get_template_directory_uri() }}/public/assets/src/img/icone-social/mail.svg" />
      </a>
      <!-- TODO text body mail -->
    </li>
  </ul>
</div> <!-- .entry-social -->
