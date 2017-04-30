<!doctype html>

<html>
    <head>
        @include('Header.header')
        {{ wp_head() }}
    </head>
    <body {{ body_class() }}>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
            <div id="overlay_mark"></div>
            <div id="page" class="hfeed site">

                <header id="masthead" class="site-header" role="banner">
                    <div class="header-wrapper">
                        <div class="site-branding">
                            <div class="nascondi-cerchio"></div>
                            <div class="cerchio-logo">
                                <a href="{{ esc_url( home_url( '/' )) }}" rel="home">
                                    <img alt="logo L'oppure" src="<?php echo get_template_directory_uri()?>/public/assets/src/img/logo/loppure-logo-nero.svg">
                                </a>
                            </div>
                        </div><!-- .site-branding -->

                        <nav id="site-navigation" class="main-navigation" role="navigation">
                            <button class="menu-toggle" aria-controls="menu-menu-1" aria-expanded="false"></button>
                            {{ wp_nav_menu( array( 'theme_location' => 'header-menu' ) ) }}
                        </nav><!-- #site-navigation -->

                        @include('shared.searchform')

                    </div><!-- .header-wrapper -->
                </header><!-- #masthead -->

                <section id="content" class="site-content">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            @yield('content')
                        </main>
                    </div> <!-- #primary -->
                </section> <!-- #content -->

                <div class="content-assistant">
                  <span class="novita">Novità</span>
                  <button class="assistant"></button>
                  <h6>Cerbero</h6>
                  <span>la tua guida</span>
                </div>
                <div class="views-assistent">
                  @include('Assistant.assistant')
                </div>
                <button class="scroll_up" id="scroll_up"></button>

                <footer id="colophon" class="site-footer" role="contentinfo">
                    @include('Footer.footer')
                </footer>

            </div> <!-- #page -->

            <script>
                window.logged = {{ is_user_logged_in() ? 'true' : 'false' }};
            </script>

            {{ wp_footer() }}
    </body>
</html>
