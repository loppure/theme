<?php

namespace Loppure\Controllers;

class archiveController extends Controller
{
    public function __construct()
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($url, '?citta=') === false && strpos($url, '?category=') === false) {
            parent::__construct('Home.index');
        } else {
            parent::__construct('Archive.index');
        }
        $this->getPosts();
        $this->render();
    }
}
