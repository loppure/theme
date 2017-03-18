<?php
/**
 * Definizione della classe per il Responsive Server-side
 *
 * @package      Theine
 * @subpackage   Helpers
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Helpers;

use Theine\Singleton;
use Detection\MobileDetect;

/**
 * REsponsive Server Side
 *
 * Sfrutta la libreria `MobileDetect` per capire se il browser che ha
 * effettuato la richiesta è un `"phone"`, un `"tablet"` o un
 * `"desktop"`
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0
 */
class RESS extends Singleton
{
    /**
     * Definisce la classe del dispositivo: un "phone", un
     * "tablet" o un "desktop".
     *
     * @var string
     */
    private $device_type;

    /**
     * Prende delle informazioni e le rende disponibili.
     */
    protected function __construct()
    {
        $detect = new MobileDetect();

        $this->device_type = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'desktop');
    }

    /**
     * Getter per `$this->device_type`
     *
     * @return string Una stringa identificativa del
     * dispositivo. `"phone"`, `"tablet"` o `"desktop"`.
     */
    public function getDeviceType()
    {
        return $this->device_type;
    }
}
