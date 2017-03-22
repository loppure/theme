<?php
/**
 * Definizione del pattern Singleton
 *
 * @package      Theine
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine;

/**
 * Implementa il modello singleton.
 *
 * Quando si vuole avere **una e una sola** istanza di una classe, si estenda
 * questa classe. Se il constructor è settato come privato, non si potranno
 * creare diverse istanze della classe. Un metodo statico
 * `Theine\Singleton::getInstance()` è definito, e grazie a una variabile
 * statica ritorna sempre la stessa istanza, o ne crea una nuova se non ne
 * esisteva un'altra prima.
 *
 * Nella nuova versione questa classe non sarà più presente.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
class Singleton
{
    /**
     * Ritorna una istanza *signleton* della classe
     *
     * @static var Singleton $instance The *Singleton* instances of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Costruttore protetto per prevenire la creazione di una nuova istanza
     * della classe *Singleton* attraverso l'operatore new
     */
    protected function __construct()
    {
    }

    /**
     * Impedisce la clonaione di una istanza della classe
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Impedisce la deserializzazione dell'istanza sigleton
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}
