<?php

namespace Loppure\Component;

use Theine\PostField\customPostFields;

class PostFields extends customPostFields
{
    public function __construct()
    {
        parent::__construct();

        $this->prefix = "__loppure__";

        $this->post_types = array('post', 'loppure_image');

        $this->custom_fields = array(
            // array(
            //     'name'         => 'description',
            //     'title'        => 'Descrizione',
            //     'description'  => 'Descrizione dell\'immagine.',
            //     'type'         => 'textarea',
            //     'scope'        => array('loppure_image', 'post'),
            //     'capability'   => 'edit_post'
            // ),
            array(
                'name'         => 'description_2',
                'title'        => 'Descrizione',
                'description'  => 'Descrizione del post',
                'type'         => 'text',
                'scope'        =>  array( 'post', 'loppure_image' ),
                'capability'   => 'edit_post'
            ),
            array(
                'name'         => 'image_source',
                'title'        => 'Ricordati di citare la fonte.',
                'description'  => 'Aggiungi il link alla fonte/i qui.',
                'type'         => 'text',
                'scope'        => array('post', 'loppure_image', 'loppure_video'),
                'capability'   => 'edit_post'
            ),
            array(
                'name'         => 'text_source',
                'title'        => '...e di inserire un testo leggibile agli umani qui.',
                'description'  => 'Aggiungi un testo per accompagnare il link alla fonte',
                'type'         => 'text',
                'scope'        => array('post', 'loppure_image', 'loppure_video'),
                'capability'   => 'edit_post'
            )
        );
    }
}
