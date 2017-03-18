<?php
/**
 * Definizione della classe principale del tema
 *
 * @package      Theine
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine;

use Theine\YAML\Parser;
use Theine\Helpers\RESS;
use Theine\Debug\Debug;
use Theine\Assets\AssetsLoader;

/**
 * Classe principale del Tema.
 *
 * Un coltellino svizzero per caricare tutto ciò di cui il tema ha
 * bisogno. Implementa la classe `ArrayAccess` per poter dare alcune
 * proprietà all'oggeto finale.
 *
 * Esempio:
 * ```php
 * $theme = Theine\Theme()::getInstance();
 *
 * $theme['foo'] = function() { return "baz"; }
 *
 * $theme['ajax'] = new \ACME\API\Ajax();
 * // ...
 * ```
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 * @access public
 */
class Theme extends Singleton implements \ArrayAccess
{
    /**
     * Gli elementi che vengono salvati all'interno della classe
     * grazie ad `\ArrayAccess`.
     *
     * @var array
     */
    protected $contents;

    /**
     * Metodo `__construct()': inizializza l'oggetto, e salva alcune
     * informazioni che possono tornare utili.
     */
    protected function __construct()
    {
        $this->contents = array();

        $this['version'] = '1.0.0#alpha';

        $this->getConfig();

        $this['detection'] = RESS::getInstance();

        $this['debug'] = new Debug();

        $this['assets'] = AssetsLoader::getInstance();
    }

    /**
     * Setta l'offset.
     *
     * @param  string $offset La chiave (anche vuota)
     * @param  mixed  $value  Il valore
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->contents[$offset] = $value;
    }

    /**
     * Verifica che un certo offset esista.
     *
     * @param  string $offset L'indice
     * @return bool   Esiste l'offset passato?
     */
    public function offsetExists($offset)
    {
        return isset($this->contents[$offset]);
    }

    /**
     * Rimuove un certo indice
     *
     * @param  string $offset L'indice
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->contents[$offset]);
    }

    /**
     * Permette di *leggere* un offset
     *
     * @param  string $offset L'offset che si vuole *leggere*
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (is_callable($this->contents[$offset])) {
            return call_user_func($this->contents[$offset], $this);
        }

        return isset($this->contents[$offset]) ? $this->contents[$offset] : null;
    }

    /**
     * Legge la configurazione dal file `theme_root/config/config.yml`.
     *
     * @return void
     */
    private function getConfig()
    {
        $config = Parser::file('/config/config.yml');

        $this['config'] = $config;
    }

    /**
     * Si occupa di prendere tutti i valori salvati dentro `contents`,
     * e se possiedono un metodo `run` lo esegue.
     *
     * @author Omar Polo <yum1096@gmail.com>
     * @since  1.0.0 Introdotta
     */
    public function run()
    {
        foreach ($this->contents as $key => $content) {
            if (is_callable($content)) {
                $content = $this[$key];
            }

            if (is_object($content)) {
                $reflection = new \ReflectionClass($content);

                if ($reflection->hasMethod('run')) {
                    $content->run();
                }
            }
        }
    }
}
