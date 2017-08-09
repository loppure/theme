<?php
/**
 * Definizione della classe per il rendering delle view.
 *
 * @package      Theine
 * @subpackage   View
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\View;

use Theine\Theme;

use Xiaoler\Blade\FileViewFinder;
use Xiaoler\Blade\Factory;
use Xiaoler\Blade\Compilers\BladeCompiler;
use Xiaoler\Blade\Engines\CompilerEngine;
use Xiaoler\Blade\Filesystem;
use Xiaoler\Blade\Engines\EngineResolver;

/**
 * Renderizza le view.
 *
 * Si occupa di renderizzare le view. Dovrebbe essere chiamata da una
 * classe `Theine\Controller\Controller`, ma può essere usata anche da
 * altre classi (si veda, ad esempio, le classi
 * `Theine\Exceptions\ErrorHandler` e
 * `Theine\Exceptions\ExceptionsHandler`).
 *
 * Segue una serie di convenzioni:
 *
 * 1. Tutte le view sono dentro la
 *  cartella configurata in `config/config.yml`
 *
 * 2. se, nel percorso alla view, è presente il
 *  *tag* `<device>`, verrà rimpiazzato con `"Mobile"` o `"Desktop"`
 *  per indentificare, rispettivamente, i dispositivi mobili
 *  (smartphones) e *desktop* (tablet + pc)
 *
 * 3. al posto di usare i caratteri `/` ( o `\`) per indicare il
 *  separatore delle cartelle, si DEVE usare il carattere `:` o `.`.
 *
 * 4. si deve omettere l'estensione del file
 *
 * Ricapitolando: se si vuole renderizzare il file
 * `view/Desktop/Pages/index.blade.php` (o `view/Mobile/Pages/index.blade.php` sui
 * mobili), l'indirizzo che si dovrà passare alla classe sarà:
 * `<device>:Pages:index`.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 * @access public
 */
class View
{
    /**
     * Conterrà l'indirizzo alla view, una volta che la classe verrà
     * instanziata.
     *
     * @var String
     */
    private $path;

    /**
     * Conterrà i dati che la view renderizzerà.
     *
     * @var Array
     */
    private $data;

    /**
     * Contiene la classe Blade
     *
     * @var object
     */
    private $blade;

    /**
     * Contine un array di dati, come la cartella base delle view o la
     * cartella della cache.
     *
     * @var Array
     */
    protected $view_data;

    /**
     * Costruisce l'oggetto e renderizza la view voluta.
     *
     * @author Omar Polo <yum1096@gmail.com>
     * @since  1.0.0 Introdotta
     * @param String $path L'indirizzo alla view. Si vedano
     *  convenzioni espresse nell'intestazione di questa classe.
     * @param Array $data I dati da *passare* alla view.
     */
    public function __construct($path, $data = array())
    {
        if (empty($path)) {
            // errore! - lanciare un'eccezione
            return false;
        }

        // FIXME: serve solo per avere sempre il debug (se abilitato). ho
        // scoperto che aiuta abbastanza. Più avanti (theine 2?) verrà rimosso
        // da qui e sistemato meglio
        $data['debug'] = WP_DEBUG;

        $this->path = $path;
        $this->data = $data;

        $this->setViewData();

        $this->blade = $this->setsUpBlade($this->view_data['base_dir'], $this->view_data['cache']);
        $this->parsePath();
        $this->render();
    }

    /**
     * Sets up blade and load some directives
     * @author Omar Polo <yum1096@gmail.com>
     * @since 1.0.0 Introduced
     * @param String $base_dir The directory that holds the views
     * @param String $cache    The directory that holds the cache
     * @return \Jenssegers\Blade\Blade The blade object with some directives loaded
     */
    protected function setsUpBlade($base_dir, $cache) {
        $file = new Filesystem;
        $compiler = new BladeCompiler($file, $cache);

        $compiler->extend(function($value, $compiler)
        {
            $value = preg_replace('/(?<=\s)@switch\((.*)\)(\s*)@case\((.*)\)(?=\s)/', '<?php switch($1):$2case $3: ?>', $value);
            $value = preg_replace('/(?<=\s)@endswitch(?=\s)/', '<?php endswitch; ?>', $value);
            $value = preg_replace('/(?<=\s)@case\((.*)\)(?=\s)/', '<?php case $1: ?>', $value);
            $value = preg_replace('/(?<=\s)@default(?=\s)/', '<?php default: ?>', $value);
            $value = preg_replace('/(?<=\s)@break(?=\s)/', '<?php break; ?>', $value);
            return $value;
        });

        $resolver = new EngineResolver;
        $resolver->register('blade', function () use ($compiler) {
            return new CompilerEngine($compiler);
        });

        // get an instance of factory
        $factory = new Factory($resolver, new FileViewFinder($file, [$base_dir]));

        return $factory;
    }

    /**
     * Set the infos about the path of the views directory and cache directory.
     *
     * @return void
     */
    protected function setViewData()
    {
        $theme = Theme::getInstance();
        $this->view_data = array(
            "base_dir"  => get_template_directory() . $theme['config']['directory']['views'],
            "cache"     => get_template_directory() . $theme['config']['directory']['cache']
        );
    }

    /**
     * "Sistema" la stringa passata, in modo da permettere
     * l'estensione di questa classe.
     *
     * @since 1.0.0 Introdotta
     */
    protected function parsePath()
    {
        $path = str_replace(':', '.', $this->path);

        if (strpos($path, '<device>') !== false) {
            $theme = Theme::getInstance();
            $device_type = $theme['detection']->getDeviceType();

            if ($device_type === 'phone') {
                $path = str_replace('<device>', 'phone', $path);
            } else {
                $path = str_replace('<device>', 'desktop', $path);
            }
        }

        $this->path = $path;
    }

    /**
     * Si occupa di renderrizzare la view.
     *
     * @author Omar Polo <yum1096@gmail.com>
     * @since  1.0.0 Introdotta
     * @return void
     */
    protected function render()
    {
        ob_start();
        echo $this->blade->make($this->path, $this->data);
        ob_end_flush();
    }
}
