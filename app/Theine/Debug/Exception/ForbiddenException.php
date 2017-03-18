<?php
/**
 * Definizione di una eccezione personalizzata.
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
class ForbiddenException extends Exception
{
    /**
     * Crea un oggetto Excpetion con i dovuti parametri,
     */
    public function __construct()
    {
        $message = 'Forbidden! You do not have the right permission!';
        $code = 503;

        parent::__construct($code, $message);
    }
}