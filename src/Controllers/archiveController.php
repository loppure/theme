<?php

namespace Loppure\Controllers;

class archiveController extends Controller
{
    public function __construct()
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($url, "polaroid")) {
            parent::__construct('Archive.archive-post-type.archive-polaroid');
        } else if (strpos($url, "eventi")) {
            parent::__construct('Archive.archive-post-type.archive-eventi');
        } else if (strpos($url, "reportage")) {
            parent::__construct('Archive.archive-post-type.archive-reportage');
        } else if (strpos($url, "team")) {
            parent::__construct('Archive.archive-post-type.archive-team');
        } else if (strpos($url, '?citta=') === false && strpos($url, '?category=') === false) {
            parent::__construct('Home.index');
        } else {
            parent::__construct('Archive.index');
        }
        $this->getPosts();
        $this->render();
    }
}
