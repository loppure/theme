<?php

namespace Loppure\Controllers;

use \StdClass;

class authorController extends Controller
{
    public function __construct()
    {
        parent::__construct('Author.index');
        $this->getPosts();

        
        $this->getAuthorInfo();
        
        $this->render();
    }
}
