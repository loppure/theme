<?php
/**
 * Definizione di una eccezione personalizzata
 *
 * @package      Theine
 * @subpackage   Debug
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Debug\Exception;

use Exception;

/**
 * Definisce un nuovo tipo di eccezione
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 * @depecated Dalla 1.0.0
 */
class DetectOffButUsedException extends Exception
{
    /**
     * Crea un oggetto Exception con i dovuti parametri.
     */
    public function __construct()
    {
        $message = 'Seems that you have turned off device detection, but you are still using it.';
        $code = 0;

        parent::__construct($code, $message);
    }
}
