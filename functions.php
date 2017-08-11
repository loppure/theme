<?php

// composer autoload
require_once( get_template_directory() . '/vendor/autoload.php' );

use \Theine\Theme;
use \Theine\Assets\Script;
use \Theine\Assets\Style;
use \Theine\Extras\Extras;
use \Theine\PageTemplate\CustomPageTemplate;

use \Loppure\Component\TaxCitta;
use \Loppure\Component\TaxProgetti;

$theme = Theme::getInstance();

$theme['name']      = "L'oppure";
$theme['extras']    = new Extras( [
    'emoji'     => false,
    'generator' => false,
    'meta_next' => false
] );

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
// $theme['love'] = new Loppure\API\Love();

// Taxonomy -> Città
$theme['citta'] = new TaxCitta();
// Taxonomy -> Città
$theme['progetti'] = new TaxProgetti();

// Costum post Type -> Polaroid
$theme['polaroid_type'] = new Loppure\Component\PolaroidType();

// Costum post Type -> Reportage
$theme['reportage_type'] = new Loppure\Component\ReportageType();

// Costum post Type -> Evento
$theme['evento_type'] = new Loppure\Component\EventoType();

// Costum post Type -> Team
$theme['team_type'] = new Loppure\Component\TeamType();

$theme->run(); // lancia il tema ^^

// old theme shit:
require get_template_directory() . '/old-theme/custom-comment.php';
require get_template_directory() . '/old-theme/custom-stat.php';
