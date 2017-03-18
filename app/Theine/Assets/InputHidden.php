<?php
/**
 * Definizione della classe per un generico meta.
 *
 * @package      Theine
 * @subpackage   Assets
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Assets;

/**
 * Un tipo particolare di assets.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0
 */
class InputHidden implements AssetInterface
{
    /**
     * Contiene i dati (coppie attributo => valore) del metatag.
     *
     * @var array
     */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @inherit
     */
    public function run()
    {
        add_action('wp_footer', [$this, 'enqueue']);
    }

    /**
     * @inherit
     */
    public function enqueue()
    {
        echo '<input type="hidden"';

        foreach ($this->data as $key => $val) {
            echo " $key=\"$val\"";
        }

        echo '>';
    }
}
