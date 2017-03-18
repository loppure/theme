<?php
/**
 * Definizione della classe astratta per l'implementazione del
 * controller.
 *
 * @package      Theine
 * @subpackage   Controller
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Controller;

use \StdClass;
use Theine\View\View;
use Theine\Theme;

/**
 * Il Controller.
 *
 * Questa classe si occupa di gestire i dati e *indirizzarli* alla view corretta.
 * Si noti come è definita come `abstrac`. Ciò significa che non può essere inizializzata direttamente.
 *
 * Esempio di utilizzo:
 * ```
 * class indexController extends \Theine\Controller\Controller
 * {
 *   // metodi specifici per l'indexController
 * }
 *
 * // questa parte viene (generalmente) svolta dal componente \Theine\Router\Router
 * $foo = new indexController( '<device>:Bar:foo' );
 * $foo->render();
 * ```
 *
 * @author  Omar Polo <yum1096@gmail.com>
 * @since   1.0.0 Introdotta
 * @access  public
 */
abstract class Controller
{
    /**
     * Contiene l'indirizzo alla view da renderizzare
     *
     * @var String
     */
    private $path_view;

    /**
     * Contiene l'oggetto della view.
     *
     * @var Theine\View\View
     */
    private $view;

    /**
     * I dati passati alla view
     *
     * @var array
     */
    protected $data;

    /**
     * contiene l'istanza del tema
     *
     * @var \Theine\Theme
     */
    protected $theme;

    /**
     * Contiene i post
     *
     * @var array
     */
    private $posts;

    /**
     * Si occupa di generare il nuovo oggetto.
     * Inizializza dei dati.
     *
     * @param  string  $path L'indirizzo alla view che si *vorrà* renderizzare.
     * @access public
     * @since  1.0.0 Introdotta
     */
    public function __construct($path)
    {
        $theme = Theme::getInstance();

        $this->path_view = $path;
        $this->view = false;
        $this->data = [ 'device' => $theme['detection']->getDeviceType() ];
        $this->theme = $theme;
        $this->posts = array();
    }

    /**
     * Renderizza la view.
     *
     * @since  1.0.0
     * @access public
     * @return \Theine\View\View A view
     */
    public function render()
    {
        return $this->view = new View($this->path_view, $this->data);
    }

    /**
     * blah
     *
     * @param
     */
    public function getPosts($custom_filters = array(), $author = true, $comments = true)
    {
        if (have_posts()) {
            while (have_posts()) {
                the_post();

                $post = new StdClass();

                $post->id = get_the_ID();
                $post->title = get_the_title();
                $post->excerpt = get_the_excerpt();
                $post->category = $this->getCategory();
                $post->category_list = get_the_category_list();
                $post->time = get_the_time();
                //$post->taxonomy = $this->getTaxonomy();
                $post->permalink = get_the_permalink();
                $post->meta = $this->getMeta();

                foreach ($custom_filters as $filter) {
                    $name = $filter['name'];
                    $closure = $filter['closure'];
                    $post->{$name} = $closure( $post->id );
                }

                $this->posts[] = $post;
            }
        } else {
            $this->posts = false;
        }

        $this->data['posts'] = $this->posts;
    }

    /**
     *
     * @return mixed
     */
    private function getCategory()
    {
        return get_the_category();
    }

    /**
     *
     * @return mixed
     */
    private function getTaxonomy()
    {
        return get_the_taxonomy();
    }

    /**
     *
     * @return mixed
     */
    private function getMeta()
    {
        return get_post_meta(get_the_ID());
    }
}
