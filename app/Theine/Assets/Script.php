<?php
/**
 * Definizione della classe per la gestione degli script javascript.
 *
 * @package      Theine
 * @subpackage   Assets
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Assets;

use Theine\Theme;

/**
 * Un tipo di asset.
 *
 * La classe `Script` implementa un tipo di asset: lo script
 * javascript. In aggiunta alle funzionalità definite da wordpress,
 * questa classe permette di far accodare lo script solo in alcuni
 * dispositivi.
 *
 * Esempio di utilizzo:
 * ```php
 * use Theine\Theme;
 * use Theine\Assets\AssetsLoder;
 * use Theine\Assets\Script;
 *
 * $theme = Theme::getInstace();
 * $theme['assets'] = AssetsLoader::getInstance();
 *
 * $theme['assets'][] = new Script( 'foo', 'foo.js', [], '1.0.0', true, true, ['tablet', 'desktop'] );
 *
 * $theme->run();
 * ```
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
class Script implements AssetInterface
{
    /**
     * Contiene il nome dello script.
     *
     * @var string
     */
    public $name;

    /**
     * Contiene l'indirizzo relativo allo script.
     *
     * @var string
     */
    public $src;

    /**
     * Contiene l'elenco delle dipendenze.
     *
     * @var array
     */
    public $dependencies;

    /**
     * Contiene una stringa che definisce il numero di versione dello
     * script.
     *
     * **Se `WP_DEBUG` è attivo, questo campo verrà sovrascritto per
     *  garantire che i browser non eseguano la cache del file**.
     *
     * @var string
     */
    public $version;

    /**
     * Definisce se lo script deve essere nel footer oppure no
     *
     * @var bool
     */
    public $in_footer;

    /**
     * Definisce se lo script deve essre caricato nel frontend oppure
     * no
     *
     * @var bool
     */
    public $in_frontend;

    /**
     * Un array che definisce in che dispositivi lo script deve essere
     * caricato.
     *
     * @var array
     */
    public $device_type;

    /**
     * Inizializza l'oggetto
     *
     * @param String $name         Il nome dello script
     * @param String $src          Il percorso relativo delle script (implicito `public/assets/dist/script`)
     * @param Array  $dependencies Le dipendenze dello script
     * @param String $version      La versione
     * @param Bool   $in_footer    Se deve essere caricato nel footer oppure no
     * @param Bool   $in_frontend  Se deve essere caricato nel frontend oppure no
     * @param Array  $device_type  Un array contente il nome dei dispositivi sul
     *   quale deve essere caricato (`phone`, `tablet` e/o `desktop`
     * @since  1.0.0 Introdotta
     * @TODO migliorare le api
     */
    public function __construct($name, $src, $dependencies, $version, $in_footer, $in_frontend, $device_type)
    {
        $this->name         = $name;
        $this->src          = $src;
        $this->dependencies = $dependencies;
        $this->version      = $version;
        $this->in_footer    = $in_footer;
        $this->in_frontend  = $in_frontend;
        $this->device_type  = $device_type;
    }

    /**
     * Aggiunge l'hook a wordpress per chiamare poi la funzione
     * `enqueue`
     *
     * @since  1.0.0 Introdotta
     * @return void
     */
    public function run()
    {
        $theme = Theme::getInstance();
        $device_type = $theme['detection']->getDeviceType();

        if (in_array($device_type, $this->device_type)) {
            add_action('wp_head', [$this, 'enqueue']);
        }
    }

    /**
     * Accoda lo script.
     */
    public function enqueue()
    {
        $theme = Theme::getInstance();

        wp_enqueue_script(
            $this->name,
            get_template_directory_uri() . $theme['config']['directory']['assets'] . 'script/' . $this->src,
            $this->dependencies,
            WP_DEBUG ? time() : $this->version,
            $this->in_footer
        );
    }
}
