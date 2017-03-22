<?php
/**
 * Definizione della classe per il rendering delle view.
 *
 * @package      Theine
 * @subpackage   PostType
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\PostType;

class CustomPostType
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $cpt;

    /**
     * @param string $name Un nome
     * @param array  $cpts Un array con le info del custom post type
     */
    public function __construct($name, $cpt)
    {
        $this->name = $name;
        $this->cpt = $cpt;
    }

    /**
     * Accoda la registrazione
     *
     * @return void
     */
    public function run()
    {
        add_action('init', [$this, 'register'], 0);
    }

    /**
     * Registra il post type
     *
     * @return void
     */
    public function register()
    {
        register_post_type($this->name, $this->cpt);
    }
}
