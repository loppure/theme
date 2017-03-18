<?php
/**
 * Definizione della classe per le custom taxonomies
 *
 * @package      Theine
 * @subpackage   Taxonomy
 * @author       Omar Polo <yum1096@gmail.com>
 */

namespace Theine\Taxonomy;

class CustomTaxonomy
{
    /**
     * Contiene il nome della taxonomy
     *
     * @var string
     */
    private $name;

    /**
     * Contiene l'elenco dei post type a cui è associata
     *
     * @var array
     */
    private $post_type;

    /**
     * Contiene le taxonomy passate al __construct
     *
     * @var array
     */
    private $tax;

    /**
     * @param array $tax Un array di custom taxonomies.
     */
    public function __construct($name, $post_type, $tax = array())
    {
        $this->name = $name;
        $this->post_type = $post_type;
        $this->tax = $tax;
    }

    /**
     * Setta l'esecuzione del metodo `enqueue` sull'hook `init`
     *
     * @return void
     */
    public function run()
    {
        add_action('init', [$this, 'register'], 0);
    }

    /**
     * Registra la taxonomy
     *
     * @return void
     * @todo quel flush_rewrite_rules() non va chiamato a ogni richiesta D:
     */
    public function register()
    {
        register_taxonomy($this->name, $this->post_type, $this->tax);

        flush_rewrite_rules();
    }
}
