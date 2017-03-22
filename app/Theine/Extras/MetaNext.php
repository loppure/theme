<?php
/**
 * Definizione della classe per la gestione del metatag `next`
 *
 * @package      Theine
 * @subpackage   Extras
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Extras;

/**
 * Abilita o disabilita il link presente nel tag `<head>` del sito, che indica
 * al browser la pagina/post successivo/precedente.
 *
 * @since  1.0.0 Introdotta
 * @author Omar Polo <yum1096@gmail.com>
 */
class MetaNext
{
    /**
     * Se abilitare o no il meta *next*
     *
     * @var bool
     */
    private $enable;

    /**
     * Inizializza l'oggetto, chiama `toggle_meta_next()` sull'hook `init`.
     *
     * @param bool $enable Se abilitare oppure no il meta *next*
     */
    public function __construct($enable)
    {
        $this->enable = $enable;

        add_action('init', [$this, 'toggleMetaNext']);
    }

    /**
     * Decide se mostrare oppure no il meta *next*
     *
     * @return void
     */
    public function toggleMetaNext()
    {
        if ($this->enable) {
            add_action('wp_head', 'start_post_rel_link', 10, 0);
            add_action('wp_head', 'adjacent_post_rel_link', 10, 0);
        } else {
            remove_action('wp_head', 'start_post_rel_link', 10, 0);
            remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        }
    }
}
