<?php
/**
 * Definizione della classe per alcune funzionalità di debug.
 *
 * @package      Theine
 * @subpackage   Debug
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Debug;

/**
 * `Debug` gestisce l'aspetto debug-friendly del tema.
 *
 * Fornisce delle funzioni comode per lanciare degli errori o delle
 * eccezioni per vedere se vengono *prese* degli handler. Fornisce
 * delle funzioni per catturare gli errori e mandarli alla rispettive
 * view. Si vedano le classi `Theine\Debug\ErrorHandler` e
 * `Theine\Debug\ExceptionHandler` per comprendere come gli errori
 * vengano davvero gestiti.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 * @access public
 */
class Debug
{
    /**
     * Dice a wordpress, se `WP_DEBUG` è `true`, di non mandare l'header della cache.
     */
    public function __construct()
    {
        if (! WP_DEBUG) {
            nocache_headers();
        }
    }

    /**
     * Quando eseguita, vengono registrate le funzioni per la gestione
     * degli errori e delle eccezioni
     *
     * @return void
     * @since  1.0.0 Introdotta
     */
    public function run()
    {
        // gestione delle eccezioni
        set_exception_handler(function ($err) {
            new ExceptionHandler($err);
        });

        // gestione degli errori
        set_error_handler(function ($errno, $errstr, $errfile, $errline, $errcontext) {
            new ErrorHandler($errno, $errstr, $errfile, $errline, $errcontext);
        }, E_ALL);
    }

    /**
     * Genera un errore. Utile in alcuni casi per testare l'aspetto
     * debug del tema.
     *
     * @return void
     * @since  1.0.0 Introdotta
     */
    public function throwAnError()
    {
        trigger_error("Errore @deòaa#", E_USER_ERROR);
    }

    /**
     * Lancia un'eccezione. Anche questa cosa può tornare utile, in
     * alcuni casi...
     *
     * @return void
     * @since  1.0.0
     */
    public function throwAnException()
    {
        throw new \Exception('blah blah blah');
    }
}
