<?php
/**
 * Definizione di una classe handler per gli errori.
 *
 * @package      Theine
 * @subpackage   Debug
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Debug;

use Theine\View\View;

/**
 * Una (primitiva) gestione degli errori.
 *
 * Wordpress gestisce gli errori in maniera schifosa. O meglio, non li
 * gestisce affatto quasi. Fortunatamente php permette di definire
 * degli Handler per una gestione migliore degli errori.
 *
 * ErrorHandler si occupa di questo. Genera delle view per gli errori.
 *
 *
 * @since  1.0.0 Introdotta
 * @author Omar Polo <yum1096@gmail.com>
 * @access public
 */
class ErrorHandler
{
    /**
     * Contiene i dati dell'errore passato al `__construct`
     *
     * @var array
     */
    private $error;

    /**
     * Inizializza l'oggetto e renderizza la pagina di errore. Poi fa
     * morire il processo.
     *
     * @param  Integer  $errno       Il numero dell'errore.
     * @param  String   $errstr      Una strainga che descrive l'errore.
     * @param  String   $errfile     Contiene il nome del file dove si
     * è verificato l'errore.
     * @param  Integer  $errline     Contiene il numero della riga.
     * @param  Array    $errcontext  Se fornito, `$errcontext`
     * conterrà un array di ogni variabile che essiteva nello `scope`
     * dove è stato lanciato l'errore.
     * @return void
     * @author Omar Polo <yum1096@gail.com>
     * @since  1.0.0 Introdotta
     * @access public
     */
    public function __construct($errno, $errstr, $errfile = "", $errline = -1, $errcontext = array())
    {
        $this->error = array(
            "number"   => $errno,
            "message"  => $errstr,
            "file"     => $errfile,
            "line"     => $errline,
            "context"  => $errcontext,
            "debug"    => WP_DEBUG
        );

        $e = new View('Debug:Error:generic', $this->error);

        die("");
    }
}
