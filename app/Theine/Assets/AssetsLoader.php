<?php
/**
 * Definizione della classe per l'accodamento degli assets.
 *
 * @package      Theine
 * @subpackage   Assets
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Assets;

use \Theine\Theme;
use \Theine\Singleton;
use \ArrayAccess;
use \Theine\Assets\AssetInterface;

/**
 * Si occupa di gestire gli assets.
 *
 * Questa classe permette di registrare delle istanze della classe
 * Theine\Assets\AssetInterface e si occupa di lanciarle tutte.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
class AssetsLoader extends Singleton implements ArrayAccess
{
    /**
     * Contine un array di oggetti
     *
     * @var array
     */
    private $assets;

    /**
     * Inizializza il tutto.
     *
     * È protected per via del design *Singleton* di questa classe. Si
     * vuole avere solo un'istanza per volta.
     *
     * `$foo = new Theine\Assets\AssetsLoader();` genera un errore. Si
     * usi invece `$foo = Theine\Assets\AssetLoader::getInstance();`
     *
     * Esemio di utilizzo:
     * ```
     * use Theine\Theme;
     * use Theine\Assets\AssetsLoader;
     * use FooBar\Baz\FooAsset();
     *
     * $theme = Theme::getInstance();
     * $theme['assets'] = AssetsLoader::getInstance();
     *
     * $theme['assets']['foo'] = new FooAsset();
     * ```
     *
     * @since  1.0.0 Introdotta
     * @author Omar Polo <yum1096@gmail.com>
     */
    protected function __construct()
    {
        $this->assets = array();
    }

    /**
     * Implementa, come richiesto da `\ArrayAccess` il "settare" un
     * elemento. Se `$value` non è un'istanza di
     * `Theine\Assets\AssetInterface` lancia un errore.
     *
     * @param string $offset Il nome dell'indice
     * @param any    $value  Il valore
     */
    public function offsetSet($offset, $value)
    {
        if (! $value instanceof AssetInterface) {
            // throw exception...
            return false;
        }

        if (is_null($offset)) {
            $this->assets[] = $value;
        } else {
            $this->assets[$offset] = $value;
        }
    }

    /**
     * Controlla se un certo offset è presente
     *
     * @param string $offset L'indice
     */
    public function offsetExists($offset)
    {
        return isset($this->assets[$offset]);
    }

    /**
     * Rimuove un offset
     *
     * @param string $offset L'indice
     */
    public function offsetUnset($offset)
    {
        unset($this->assets[$offset]);
    }

    /**
     * Va a prendere un valore
     *
     * @param string $offset L'indice
     */
    public function offsetGet($offset)
    {
        return isset($this->assets[$offset]) ? $this->assets[$offset] : null;
    }

    /**
     * Esegue tutti gli assets registrati.
     */
    public function run()
    {
        foreach ($this->assets as $key => $object) {
            $object->run();
        }
    }
}
