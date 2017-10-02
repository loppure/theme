<!doctype html>

<html>
    <head>
        @include('Header.header')
        {{ wp_head() }}
    </head>
    <body {{ body_class() }}  >
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
            <div id="overlay_mark"></div>
            <div id="page" class="hfeed site">

                <header id="masthead" class="site-header" role="banner">
                    <div class="header-wrapper">

                      <!-- menu classico -->
                      <nav id="site-navigation" class="main-navigation menu-classic" role="navigation">
                        <button id="click-action-open-close" data-tab="content-menu-navigation-cotrol" class="button-control-navigation">
                          Esplora
                        </button>
                        {{ wp_nav_menu( array( 'theme_location' => 'header-menu' ) ) }}
                      </nav>

                      <!-- Spazio logo -->
                      <div class="site-branding">
                        <div class="nascondi-cerchio"></div>
                        <div class="cerchio-logo">
                            <a href="{{ esc_url( home_url( '/' )) }}" rel="home">
                                <img alt="logo L'oppure" src="<?php echo get_template_directory_uri()?>/public/assets/src/img/logo/loppure-logo-nero.svg">
                            </a>
                        </div>
                      </div>

                        <!--menu cosa facciamo-->
                        <nav id="control-navigation" class="control-navigation-menu">
                          <ul>
                            <li class="iscriviti">
                              <button id="click-action-open-close" data-tab="content-menu-navigation-cotrol" class="button-control-navigation">
                                Esplora
                              </button>
                            </li>
                            <li class="esplora">
                              <a href="#">Iscriviti</a>
                            </li>
                            <li>
                              <button class="menu-toggle" aria-controls="menu-menu-1" aria-expanded="false">Menu</button>
                            </li>
                          </ul>
                          @include('ControlNavigation.controlnavigation-menu')
                        </nav>
                    </div><!-- .header-wrapper -->
                </header><!-- #masthead -->

                <section id="content" class="site-full-content">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            @yield('content')
                        </main>
                    </div> <!-- #primary -->
                </section> <!-- #content -->

                <div class="pie-pagina">
                  <button class="share"></button>
                  <button class="assistant"></button>
                  <button class="scroll_up" id="scroll_up"></button>
                </div>

                <footer id="colophon" class="site-footer" role="contentinfo">
                    @include('Footer.footer')
                </footer>

            </div> <!-- #page -->

            <script>
                window.logged = {{ is_user_logged_in() ? 'true' : 'false' }};
            </script>

            <input type="hidden" name="loppure-templates-uri" id="loppure-templates-uri" value="{{ get_template_directory_uri() }}/templates.html">
            <input type="hidden" name="loppure-ajax-uri" id="loppure-ajax-uri" value="{{ admin_url('admin-ajax.php') }}">

            {{ wp_footer() }}
    </body>
</html>
