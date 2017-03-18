<?php

namespace Loppure\Controllers;

class homeController extends Controller
{
    public function __construct()
    {
        parent::__construct('Home:index');
        $this->getPosts();
        $this->render();
    }
}