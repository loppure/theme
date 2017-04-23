<?php

namespace Loppure\Controllers;

class PageNotFoundController extends Controller
{
    public function __construct()
    {
        parent::__construct('404.index');
        $this->render();
    }
}
