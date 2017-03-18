<?php
/**
 * Definizione della classe per la gestione degli emoji
 *
 * @package      Theine
 * @subpackage   Extras
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Extras;

/**
 * Supporto per gli emoji.
 *
 * Permette di abilitare/disabilitare il supporto agli emoji in wordpress.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
class Emoji
{
    /**
     * Se gli emoji devono essere abilitate oppure no.
     *
     * @var bool
     */
    private $enable;

    /**
     * Costruisce l'oggetto e setta gli hook.
     *
     * @param bool $enable Se gli emoji devono essere abilitati
     *  (`true`) oppure rimossi (`false`)
     */
    public function __construct($enable)
    {
        $this->enable = $enable;

        add_action('init', [$this, 'toggleEmoji']);
    }

    /**
     * Viene chiamata sull'hook `init` di
     * wordpress. Abilita/disabilita gli emoji.
     *
     * @return void
     */
    public function toggleEmoji()
    {
        if (!$this->enable) {
            // Remove from comment feed and RSS
            remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
            remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

            // Remove from emails
            remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

            // Remove from head tag
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

            // Remove from print related styling
            remove_action( 'wp_print_styles', 'print_emoji_styles' );

            // Remove from admin area
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
            remove_action( 'admin_print_styles', 'print_emoji_styles' );
        }
    }
}
