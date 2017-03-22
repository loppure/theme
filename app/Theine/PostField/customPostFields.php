<?php

namespace Theine\PostField;

use Theine\View\View;

abstract class customPostFields extends View
{
    /**
     * Contiene il prefisso per i CPF
     *
     * @var string
     */
    protected $prefix;

    /**
     * Contiene i PT a cui si vuole associare il CPF
     *
     * @var array
     */
    protected $post_type;

    /**
     * Definisce i custom fields
     *
     * @var array
     */
    protected $custom_fields;

    /**
     * I dati per la view
     *
     * @var array
     */
    protected $data;

    public function __construct($default = true)
    {
        $this->data = array();

        add_action('admin_menu', array($this, 'createCustomFields'));
        add_action('save_post', array($this, 'saveCustomFields'), 1, 2);

        if ($default) {
            add_action('do_meta_boxes', array($this, 'removeDefaultCustomFields'), 10, 3);
        }
    }

    /**
     * Rimuove i "default" custom fields
     *
     * @todo rimpiazzare 'my-custom-meta' con qualcosa di personalizzabile.
     */
    public function removeDefaultCustomFields($type, $context, $post)
    {
        foreach (array('normal', 'advanced', 'side') as $context) {
            foreach ($this->post_types as $post_type) {
                add_meta_box('my-custom-fields', 'Custom Fields', array($this, 'displayMetaBox'), $post_type, 'normal', 'high');
            }
        }
    }

    /**
     * Crea un nuovo custom meta box per i custom fields
     *
     * @return void
     */
    public function createCustomFields()
    {
        foreach ($this->post_types as $post_type) {
            if (function_exists('add_meta_box')) {
                add_meta_box('my-custom-fields', 'Custom Fields', array($this, 'displayMetaBox'), $post_type, 'normal', 'high');
            }
        }
    }

    /**
     * Display the new custom field
     *
     * @return void
     * @todo NON hardcodare quel 'custom_fields'
     */
    public function displayMetaBox()
    {
        $this->data['custom_fields'] = $this->custom_fields;

        $this->filterCustomFields();

        $this->data['prefix'] = $this->prefix;

        $this->data['nonce'] = array('my-custom-fields', 'my-custom-fields_wpnonce');

        $this->display();
    }

    /**
     * Filtra i custom fields
     *
     * Se l'utente corrente non ha i permessi per poter editare quel post field,
     * allora tale post field non verrà renderizzato
     *
     * @return array
     */
    protected function filterCustomFields()
    {
        global $post;
        $this->data['custom_fields'] = array_filter(
            $this->data['custom_fields'],
            function ($custom_field) use ($post) {
                return in_array($post->post_type, $custom_field['scope'])
                    &&
                    current_user_can($custom_field['capability'], $post->ID);
            }
        );

        $prefix = $this->prefix;

        $this->data['custom_fields'] = array_map(function ($custom_field) use ($post, $prefix) {
            $custom_field['content'] = htmlspecialchars(
                get_post_meta($post->ID, $prefix . $custom_field['name'], true)
            );
            return $custom_field;
        }, $this->data['custom_fields']);

        return $this->data['custom_fields'];
    }

    /**
     * Fa l'override di `Theine\View` e rimpiazza il path cartella delle view
     *
     * @return void
     */
    protected function setViewData()
    {
        parent::setViewData();

        $this->view_data['base_dir'] = get_template_directory() . '/app/Theine/Resources/views/';
    }

    /**
     * Renderizza il meta box sfruttando Theine\View\View
     * Render the `meta box` using Theine\View\View
     *
     * @return void
     */
    protected function display()
    {
        parent::__construct('customPostFields', $this->data);
    }

    /**
     * Salva il nuovo valore del custom fields
     *
     * @param Integer $post_id The post id
     * @param Object  $post    The post object
     * @return void
     */
    public function saveCustomFields($post_id, $post)
    {
        if (!isset($_POST['my-custom-fields_nonce'])
            || !wp_verify_nonce($_POST['my-custom-fields_nonce'], 'my-custom-fields')
            || !current_user_can('edit_post', $post_id)
            || !in_array($post->post_type, $this->post_types)) {
            return;
        }

        foreach ($this->custom_fields as $custom_field) {
            $field = $this->prefix . $custom_field['name'];
            if (current_user_can($custom_field['capability'], $post_id)) {
                if (isset($_POST[$field]) && trim($_POST[$field])) {
                    $value = $custom_field['type'] == 'wysiwyg'
                        ? wpautop($_POST[$field])
                        : $_POST[$field];

                    update_post_meta($post_id, $field, $_POST[$field]);
                } else {
                    delete_post_meta($post_id, $field);
                }
            }
        }
    }
}
