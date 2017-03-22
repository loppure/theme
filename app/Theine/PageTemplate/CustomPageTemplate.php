<?php
/**
 * Definizione della classe per la gestione dei custom template page.
 *
 * @package      Theine
 * @subpackage   PageTemplate
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\PageTemplate;

use Theine\Theme;

/**
 * Classe per i Custom Page Template
 *
 * Questa classe permette di definire dei custom page template **senza** dover
 * creare dei file all'interno di alcune directory (come wordpress vorrebbe).
 *
 * @since  1.0.0 Introdotta
 * @author Omar Polo <yum1096@gmail.com>
 * @link   http://wordpress.stackexchange.com/questions/142952/define-custom-page-template-without-its-own-php-file
 */
class CustomPageTemplate
{
    /**
     * Contiene tutti i *custom templates* che definiamo
     *
     * @var array
     */
    private $templates;

    /**
     * Inizializza l'oggetto
     *
     * @uses CustomPageTemplate::$templates
     * @uses \Theine\Theme
     */
    public function __construct()
    {
        $theme = Theme::getInstance();

        $this->templates = $theme['config']['custom_page_template'];
    }

    /**
     * Setta tutti gli hook
     *
     * @return void
     */
    public function run()
    {
        add_action('edit_form_after_editor', [$this, 'templatesInit']);
        add_action('load-post.php', [$this, 'templatesInitPost']);
        add_action('load-post-new.php', [$this, 'templatesInitPost']);
    }

    /**
     * Applica il filtro
     *
     * @return void
     */
    public function getCustomPageTemplate()
    {
        return apply_filters('custom_page_templates', $this->templates);
    }

    /**
     * Va a prendersi i template quando ci troviamo nella schermata di editing
     *
     * @uses   CustomPageTemplate::setCustomPageTemplates
     * @return void
     */
    public function templatesInit()
    {
        remove_action(current_filter(), [__CLASS__, __FUNCTION__]);
        if (is_admin() && get_current_screen()->post_type === 'page' && !empty($this->templates)) {
            $this->setCustomPageTemplates();
        }
    }

    /**
     * Torna a prendere i template quando l'editing post viene postato per
     * permettere di salvare
     *
     * @return void
     * @uses   CustomPageTemplate::templatesInit
     */
    public function templatesInitPost()
    {
        remove_action(current_filter(), [__CLASS__, __FUNCTION__]);
        $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);
        if (empty($method) || strtoupper($method) !== 'POST') {
            return;
        }
        if (get_current_screen()->post_type === 'page') {
            $this->templatesInit();
        }
    }

    /**
     * Questo metodo modifica la cache per includere i nostri template (oltre a
     * quelli già presenti)
     */
    public function setCustomPageTemplates()
    {
        if (! is_array($this->templates) || empty($this->templates)) {
            return;
        }
        $core = array_flip((array) get_page_templates()); // templates defined by file
        $data = array_filter(array_merge($core, $this->templates));
        ksort($data);
        $stylesheet = get_stylesheet();
        $hash = md5(get_theme_root($stylesheet) . '/' . $stylesheet);
        $persistently = apply_filters('wp_cache_themes_persistently', false, 'WP_Theme');
        $exp = is_int($persistently) ? $persistently : 1800;
        wp_cache_set('page_templates-' . $hash, $data, 'themes', $exp);
    }
}
