<?php

namespace Loppure\Controllers;

use Theine\Assets\InputHidden;

class categoryController extends Controller
{
    public function __construct()
    {
        parent::__construct('Category:index');
        $this->getPosts();

        $this->data['category'] = single_cat_title('', false);

        $next_page_link = 
        
        $this->render();
    }

    public function footerAction()
    {
        
    }
}