<?php
/**
 * Definizione di un'eccezione personalizzata
 *
 * @package      Theine
 * @subpackage   Debug
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Debug\Exception;

use Theine\View\View;
use Exception;

/**
 * ScriptBadSrcExcpetion viene lanciata quando non viene passato un `src`
 * corretto alla classe Theine\Scripts\Script.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 * @access public
 */
class ScriptBadSrcException extends Exception
{
    /**
     * Genera un bel messaggio d'errore e poi fa fare il resto a \Exception.
     *
     * @param  Array  $device  The wrong device name used
     */
    public function __construct($devices)
    {
        $devices = implode(" - ", array_keys($device));
        $message = "Wrong type of device(s) ($devices). Maybe a typo?";
        $code = 0;

        parent::__construct($code, $message);
    }
}
