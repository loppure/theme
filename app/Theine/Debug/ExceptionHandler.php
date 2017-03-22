<?php
/**
 * Definizione di una classe-handler per le eccezioni.
 *
 * @package      Theine
 * @subpackage   Debug
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Debug;

use Theine\View\View;

/**
 * Gestisce le eccezioni
 *
 * In maniera simile alla classe `Theine\Exceptions\ErrorHandler` questa
 * gestisce si occupa di gestire le eccezioni. Genera un template dove vengono
 * mostrate delle informazioni sull'eccezione.
 *
 * @since  1.0.0 Introdotta
 * @author Omar Polo <yum1096@gmail.com>
 * @access public
 */
class ExceptionHandler
{
    /**
     * Il costruttore.
     *
     * Si occupa di renderizzare la view per l'eccezione.
     *
     * @param  \Exception  $exception  Una eccezione
     * @since  1.0.0 Introdotta
     * @author Omar Polo <yum1096@gmail.com>
     */
    public function __construct($exception)
    {
        $v = new View('Debug:Exceptions:500', ["exception" => $exception]);

        die("");
    }
}
