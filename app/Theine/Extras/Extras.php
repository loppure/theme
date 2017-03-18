<?php
/**
 * Definizione della classe per la gestione degli extras.
 *
 * @package      Theine
 * @subpackage   Extras
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Extras;

/**
 * Dei piccoli extra per semplificare alcune cose.
 *
 * Questa classe si occupa di caricare degli extra, che possono risultare utili.
 *
 * @todo   Migliorare il sistema per abilitare gli extra selezionati
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
class Extras
{
    /**
     * Contiene gli extra che si vogliono abilitare.
     *
     * @var array
     */
    private $extras;

    /**
     * Costruisce l'oggetto, prepara tutto per il metodo `run()`.
     *
     * @param array $extras Un array di extras che si vogliono abilitare.
     */
    public function __construct($extras)
    {
        $this->extras = $extras;
    }

    /**
     * Si occupa di abilitare gli extra scelti.
     *
     * @return void
     */
    public function run()
    {
        if (array_key_exists('emoji', $this->extras)) {
            $this->extras[] = new Emoji($this->extras['emoji']);
        }

        if (array_key_exists('generator', $this->extras)) {
            $this->extras[] = new MetaGenerator($this->extras['generator']);
        }

        if (array_key_exists('meta_next', $this->extras)) {
            $this->extras[] = new MetaNext($this->extras['meta_next']);
        }
    }
}
