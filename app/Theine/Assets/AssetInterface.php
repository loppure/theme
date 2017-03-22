<?php
/**
 * Definizione dell'interfaccia per gli assets.
 *
 * @package      Theine
 * @subpackage   Assets
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Assets;

/**
 * Interfaccia per gli asset.
 *
 * Tutti i tipi di assets (da quelli predefiniti come `Theine\Assets\Script` e
 * `Theine\Assets\Style` a quelli personalizzati) devono implementare questa
 * interfaccia.
 *
 * @author Omar Polo <yum1096@gmail.com>
 * @since  1.0.0 Introdotta
 */
interface AssetInterface
{
    /**
     * Viene richiamata da Theine\Asstes\AssetsLoader.
     *
     * Dovrebbe registrare il metodo `enqueue` su un hook di wordpress.
     * `enqueue`
     */
    public function run();

    /**
     * Metodo che si occupa di accodare la risorsa voluta.
     */
    public function enqueue();
}
