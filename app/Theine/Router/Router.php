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
    private $routes = [];

    /**
     * Contiene la configurazione iterna (le coppie `"nome route" =>
     * "conditional tags"`.
     *
     * @var array
     */
    private static $mapping = [
        'author'    => 'is_author',
        'category'  => 'is_category',
        //'taxonomy'  => 'is_tax',
        'date'      => 'is_date',
        'tag'       => 'is_tag',
        'singular'  => 'is_singular',
        'single'    => 'is_single',
        'font_page' => 'is_front_page',
        'home'      => 'is_home',
        '404'       => 'is_404',
        'search'    => 'is_search',
        'page'      => 'is_page',
        'archive'   => 'is_archive'
    ];

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
     * @return Theine\Controller\Controller
     */
    public function choose()
    {
        $controller = null;

        foreach ($this->routes as $route => $controller) {
            if (self::is($route)) {
                $controller = $this->execute($controller);
                break;
            }
        }

        if ($controller == null && isset($this->routes['default'])) {
            $controller = $this->execute($this->routes['default']);
        } else {
            new \Exception("no default route configured!");
        }

        return $controller;
    }

    /**
     * Execute a given controller and returns it
     *
     * @param String $controller A string that defines a controller to
     * be executed. Could be a simple class name (with namespace) to
     * be initializated or a class with a method to be called. REQUIRE
     * not null and not empty.
     * @return Theine\Controller\Controller
     */
    private function execute($controller)
    {
        if (strstr($controller, "::")) {
            list($class, $method) = explode("::", $controller);
            $c = new $class();
            $c->$method();
            return $c;
        }

        return new $controller();
    }

    /**
     * Test a specific route
     * @param $route a single route selector, see `Router::is`
     * @return boolean true if the $route is matched
     * @see Theine\Router\Router::is
     */
    private static function match($route)
    {
        // let's see if $route contains a bang
        $bang = $route[0] == '!';
        // in case, remove it
        $route = preg_replace('/!/', '', $route);

        // let's see if $route contains a parameter
        $par = preg_replace('/\w*\((.*)\)/i', '$1', $route);
        // and remove it!
        $route = preg_replace('/\(.*\)/i', '', $route);

        // now `$route` should contain ONLY the name of a route, $bang
        // should be a Boolean and $par should be either the empty
        // string or the parameter to the route

        $matched = false;

        switch ($route) {
        case '*':
            $matched = true;
            break;

        case "category":
            if (is_category()) {
                if ($par) {
                    // TODO: check category name
                    $matched = true;
                } else {
                    $matched = true;
                }
            }
            break;

        case "taxonomy" :
            if (!is_archive()) {
                break;
            }
            if ($par) {
                $matched = get_query_var('taxonomy', false) === $par;
            } else {
                $matched = get_query_var('taxonomy', false);
            }
            break;

        default:
            $matched = isset(self::$mapping[$route]) && self::$mapping[$route]();
            break;
        }

        return $bang ? !$matched : $matched;
    }

    /**
     * A specification for a route, or more, is a simple string that
     * can be generated by the following grammar:
     *
     * ```
     * S -> s | !s | "S|S"
     * ```
     *
     * where `s` is a selector. All spaces are ignored.
     *
     * A selector is the name of a route (e.g. "home", "single",
     * "404", ...) and can, optionally, contain a parameter
     * i.e. "taxonomy(foo)" is true only if the current taxonomy
     * archive is for the taxonomy "foo".
     *
     * A bang (`!`) before a selector means that the selector is
     * negated.
     *
     * The route '*' act as a wild-card, is always matched.
     *
     * The actual implementation of this method could accept a grammar
     * that is a slightly more generic that the one
     * specified. However, you are encouraged to follow the
     * specification.
     *
     * @param string $route A specification of one or more routes.
     * @return true if the given route (or one of the given routes)
     * are matched by the current page.
     */
    public static function is($route)
    {
        $route = preg_replace('/\s+/i', '', $route);
        $tokens = explode('|', $route);

        return array_reduce($tokens, function ($matched, $token) {
            return $matched or self::match($token);
        }, false);
    }
}
