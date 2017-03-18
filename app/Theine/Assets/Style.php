<?php
/**
 * Definizione della classe per la gestione dei fogli di stile.
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
 * La classe `Style` implementa un tipo di asset: il foglio di stile
 * css. In aggiunta alle funzionalità definite da wordpress, questa
 * classe permette di far accodare lo script css solo in alcuni
 * dispositivi.
 *
 * Esempio di utilizzo:
 * ```php
 * use Theine\Theme;
 * use Theine\Assets\AssetsLoder;
 * use Theine\Assets\Style;
 *
 * $theme = Theme::getInstace();
 * $theme['assets'] = AssetsLoader::getInstance();
 *
 * $theme['assets'][] = new Style( 'foo', 'foo.css', [], '1.0.0', true, ['tablet', 'desktop'] );
 *
 * $theme->run();
 * ```
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */

class Style implements AssetInterface
{
    /**
     * Contiene il nome del foglio di stile.
     *
     * @var string
     */
    public $name;

    /**
     * Contiene l'indirizzo relativo allo stile.
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
     * Contiene una stringa che definisce il numero di versione del
     * foglio di stile.
     *
     * **Se `WP_DEBUG` è attivo, questo campo verrà sovrascritto per
     *  garantire che i browser non ne eseguano la cache**
     *
     * @var string
     */
    public $version;

    /**
     * Definisce se lo stile deve essre caricato nel frontend oppure
     * no
     *
     * @var bool
     */
    public $in_frontend;

    /**
     * Un array che definisce in che dispositivi lo stile deve essere
     * caricato.
     *
     * @var array
     */
    public $device_type;


    /**
     * Inizializza l'oggetto
     *
     * @param String $name         Il nome dello stile
     * @param String $src          Il percorso relativo delle stile (implicito `public/assets/dist/styles`)
     * @param Array  $dependencies Le dipendenze dello stile
     * @param String $version      La versione
     * @param Bool   $in_frontend  Se deve essere caricato nel frontend oppure no
     * @param Array  $device_type  Un array contente il nome dei dispositivi sul
     *   quale deve essere caricato (`phone`, `tablet` e/o `desktop`
     * @since  1.0.0 Introdotta
     */
    public function __construct($name, $src, $dependencies, $version, $in_frontend, $device_type)
    {
        $this->name         = $name;
        $this->src          = $src;
        $this->dependencies = $dependencies;
        $this->version      = $version;
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
            add_action('wp_enqueue_scripts', [$this, 'enqueue']);
        }
    }

    /**
     * Accoda lo stile.
     */
    public function enqueue()
    {
        $theme = Theme::getInstance();

        wp_enqueue_style(
            $this->name,
            get_template_directory_uri() . $theme['config']['directory']['assets'] . 'styles/' . $this->src,
            $this->dependencies,
            WP_DEBUG ? time() : $this->version
        );
    }
}
