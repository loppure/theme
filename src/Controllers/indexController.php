<?php

namespace Loppure\Controllers;

class indexController extends Controller
{
    public function __construct()
    {
        parent::__construct('Index:index');

        $this->getPosts();
        
        $this->render();
    }
}
