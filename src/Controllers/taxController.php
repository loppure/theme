<?php

namespace Loppure\Controllers;

use \StdClass;

class taxController extends Controller
{
    public function __construct()
    {
        $term = get_term_by(
            'slug',
            get_query_var('term'),
            get_query_var('taxonomy')
        );

        parent::__construct("Taxonomy:". $term->taxonomy);

        $this->getPosts();

        $file = $this->theme['config']['directory']['assets'] . 'dist/img/' . $term->slug . '/' . date('d') . '.jpg';

        $taxonomy = new StdClass();
        $taxonomy->slug = $term->slug;
        $taxonomy->name = $term->name;
        $taxonomy->cover = false;

        if (file_exists(get_template_directory() . $file)) {
            $taxonomy->cover = get_template_directory_uri() . $file;
        }

        $this->data['taxonomy'] = $taxonomy;

        $this->render();
    }
}
