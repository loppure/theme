<!doctype html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- TODO caricare tramite il fuction -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i" rel="stylesheet">
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

                <footer id="colophon" class="site-footer" role="contentinfo">
                    <div class="site-info">
                        {{ wp_nav_menu( array( 'theme_location' => 'header-menu' ) ) }}
                        <?php dynamic_sidebar('sidebar-footer') ?>
                    </div>
                </footer>

                <div class="scroll_up" id="scroll_up"></div>

            </div> <!-- #page -->

            <script>
                window.logged = {{ is_user_logged_in() ? 'true' : 'false' }};
            </script>

            {{ wp_footer() }}
    </body>
</html>
