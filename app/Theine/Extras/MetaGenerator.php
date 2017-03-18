<?php
/**
 * Definizione della classe per la gestione del metatag `generator`
 *
 * @package      Theine
 * @subpackage   Extras
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Extras;

/**
 * Abilita o disabilita il metatag *generator* dal sito.
 *
 * @since  1.0.0 Introdotta
 * @author Omar Polo <yum1096@gmail.com>
 */
class MetaGenerator
{
    /**
     * Preserva o rimuove il metatag
     *
     * @param bool $enable Se si vuole mantenere il meta oppure no.
     */
    public function __construct($enable)
    {
        if (!$enable) {
            remove_action('wp_head', 'wp_generator');
        }
    }
}
