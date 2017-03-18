<?php
/**
 * Definizione della classe per il routing
 *
 * @package      Theine
 * @subpackage   Router
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Router;

use Theine\Theme;

/**
 * La classe di routing.
 *
 * Questa classe implementa un sistema di routing grazie ai
 * *conditional tags* di wordpress.
 * Supporta una configurazione da oggetto o da file yaml.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
class Router
{
    /**
     * Le route definite dall'utente (sia a mano che da yaml)
     *
     * @var array
     */
    private $routes;

    /**
     * Contiene il controller che viene lanciato.
     *
     * @var \Theine\Controller\Controller
     */
    private $active_controller;

    /**
     * Contiene la configurazione iterna (le coppie `"nome route" =>
     * "conditional tags"`.
     *
     * @var array
     */
    private $mapping;

    /**
     * Inizializza l'oggetto
     */
    public function __construct()
    {
        $this->routes = [];

        $this->mapping = [
            'author'    => 'is_author',
            'category'  => 'is_category',
            'taxonomy'  => 'is_tax',
            'date'      => 'is_date',
            'tag'       => 'is_tag',
            'singular'  => 'is_singular',
            'single'    => 'is_single',
            'font_page' => 'is_front_page',
            'home'      => 'is_home',
            '404'       => 'is_404',
            'search'    => 'is_search',
            'page'      => 'is_page'
        ];
    }

    /**
     * Permette all'utente di configurare le route da PHP
     *
     * @param string $path Il tipo di route si vuole definire. Sono supportati:
     *  * `author` => Archivio dell'autore
     *  * `category` => Archivio della categoria
     *  * `taxonomy` => Archivio della tassonomia
     *  * `date` => Archivio di un giorno/mese/anno
     *  * `tag` => Archivio dei post con un certo tag
     *  * `singular` => Un singolo post/pagina
     *  * `single` => Un singolo post (eventualmente custom post type)
     *  * `front_page` => La prima pagina (non la home, ma una pagina statica)
     *  * `404` => La pagina 404
     *  * `search` => Il template per la pagina dei risultati della ricerca
     *  * `page` => Una pagina singola
     * @param string $class Il nome (completo di namespace) della
     *  classe *controller* da lanciare. Non viene fatto nessun
     *  controllo su la classe passata estende oppure no
     *  `Theine\Controller\Controller`, sebbene sia consigliato.
     * @return void
     */
    public function add($path, $class)
    {
        $this->routes[ $path ] = $class;
    }

    /**
     * Permette di caricare le route da file yaml
     * (`theme_root/config/config.yaml`).
     *
     * @return void
     */
    public function fromConfig()
    {
        $theme = Theme::getInstance();

        if (isset($theme['config']['routing'])) {
            foreach ($theme['config']['routing'] as $route => $controller) {
                $this->add($route, $controller);
            }
        }

        $this->choose();
    }

    /**
     * Dopo aver definito le route, sceglie quale controller far
     * partire.
     *
     * @return void
     */
    public function choose()
    {
        $found = false;

        foreach ($this->routes as $route => $controller) {
            if (isset($this->mapping[$route]) && $this->mapping[$route]()) {
                $found = true;
                $this->active_controller = new $controller();
                break;
            }
        }

        if (!$found && isset($this->routes['default'])) {
            $this->active_controller = new $this->routes['default']();
        } else {
            // throw exception!
            new \Exception("no default route configured!");
        }

        return $this->active_controller;
    }
}
