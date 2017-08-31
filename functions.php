<?php

// composer autoload
require_once( get_template_directory() . '/vendor/autoload.php' );

use \Theine\Theme;
use \Theine\Assets\Script;
use \Theine\Assets\Style;
use \Theine\Extras\Extras;
use \Theine\PageTemplate\CustomPageTemplate;
use \Theine\Router\Router;

use \Loppure\Component\TaxCitta;
use \Loppure\Component\TaxProgetti;
use \Loppure\Component\TaxReportage;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FingersCrossedHandler;

$theme = Theme::getInstance();

$theme['name']      = "L'oppure";
$theme['extras']    = new Extras( [
    'emoji'     => false,
    'generator' => false,
    'meta_next' => false
] );

// setting up monolog
$log = new Logger($theme['name']);
$h = new StreamHandler(get_template_directory() . '/log/errors.log');
$log->pushHandler(new FingersCrossedHandler($h, Logger::CRITICAL));
// debug only
$log->pushHandler(new StreamHandler(get_template_directory() . '/log/debug.log'));
// end debug only
$theme['log'] = $log;

$theme['page_template'] = new CustomPageTemplate();

$theme['assets'][]  = new Script( 'loppure', 'desktop.js', array(), '1.0.0', true, true, ['desktop'] );
$theme['assets'][]  = new Script( 'loppure', 'mobile.js',  array(), '1.0.0', true, true, ['tablet', 'phone']  );

$theme['assets'][]  = new Style( 'loppure-style', 'app.css', array(), '1.0.0', true, ['desktop'] );
$theme['assets'][]  = new Style( 'loppure-style', 'app_tablet.css',  array(), '1.0.0', true, ['tablet']  );
$theme['assets'][]  = new Style( 'loppure-style', 'app_mobile.css',  array(), '1.0.0', true, ['phone']  );

$theme['support'] = new Loppure\ThemeSupport();
$theme['menu'] = new Loppure\Component\Menu();
$theme['sidebar'] = new Loppure\Component\Sidebar();

$theme['timeline'] = new Loppure\Component\Widgets\TimelineWidget();
$theme['last-article'] = new Loppure\Component\Widgets\LastArticle();

$theme['custom-fields'] = new Loppure\Component\PostFields();

// love
$theme['love'] = new Loppure\API\Love();

// Taxonomy -> Città
$theme['citta'] = new TaxCitta();
// Taxonomy -> Progetti
$theme['progetti'] = new TaxProgetti();
// Taxonomy -> Reportage
$theme['reportage'] = new TaxReportage();

// Costum post Type -> Polaroid
$theme['polaroid_type'] = new Loppure\Component\PolaroidType();

// Costum post Type -> Reportage
$theme['reportage_type'] = new Loppure\Component\ReportageType();

// Costum post Type -> Evento
$theme['evento_type'] = new Loppure\Component\EventoType();

// Costum post Type -> Team
$theme['team_type'] = new Loppure\Component\TeamType();

/**
 * remove the debug if we are in the backend
 * @see https://github.com/loppure/theme/issues/23
 */
if (Router::is('admin')) {
    unset($theme['debug']);
}

$theme->run(); // lancia il tema ^^

// load custom post type in home
// TODO: add our custom post type
add_filter('pre_get_posts', function($query) {
    if (is_home() && $query->is_main_query()) {
        $query->set('post_type', ['post']);
    }

    return $query;
});

// old theme shit:
require get_template_directory() . '/old-theme/custom-comment.php';
require get_template_directory() . '/old-theme/custom-stat.php';
