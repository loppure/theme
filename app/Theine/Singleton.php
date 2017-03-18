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
 * Quando si vuole avere **una e una sola** istanza di una classe, si
 * estenda questa classe. Se il constructor è settato come privato,
 * non si potranno creare diverse istanze della classe. Un metodo
 * statico `Theine\Singleton::getInstance()` è definito, e grazie a
 * una variabile statica ritorna sempre la stessa istanza, o ne crea
 * una nuova se non ne esisteva un'altra prima.
 *
 * Nella nuova versione questa classe non sarà più presente.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
class Singleton
{
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @staticvar Singleton $instance The *Singleton* instances of this class.
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
     * Protected constructor to prevent creating new instance of the
     * *Singleton* class via the `new` operator from outside of this
     * class.
     */
    protected function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}
