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
use Spatie\Blade\Blade;

/**
 * Renderizza le view.
 *
 * Si occupa di renderizzare le view. Dovrebbe essere chiamata da una classe
 * `Theine\Controller\Controller`, ma può essere usata anche da altre classi (si
 * veda, ad esempio, le classi `Theine\Exceptions\ErrorHandler` e
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
     * Contine un array di dati, come la cartella base delle view o la cartella
     * della cache.
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
     * @param  Array $data I dati da *passare* alla view.
     */
    public function __construct($path, $data = array())
    {
        if (empty($path)) {
        // errore! - lanciare un'eccezione
            return false;
        }

        $this->path = $path;
        $this->data = $data;

        $this->setViewData();

        $this->blade = new Blade($this->view_data['base_dir'], $this->view_data['cache']);

        $this->parsePath();
        $this->render();
    }

    /**
     * Setta il path delle cartelle delle views e della cache
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
     * "Sistema" la stringa passata, in modo da permettere l'estensione di
     * questa classe.
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
     */
    protected function render()
    {
        //        ob_end_clean(); // clean any pre-called view.

        // if (is_customize_preview()) {
        //     ob_start();
        // } else {
        //     ob_start('gzhandler');
        // }
        ob_start();
        echo $this->blade->view()->make($this->path, $this->data);
        ob_end_flush();
    }
}
