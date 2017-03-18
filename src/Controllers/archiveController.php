<?php

namespace Loppure\Controller;

class archiveController extends Controller
{
    public function __construct()
    {
        parent::__construct('Archive.index');
        $this->getPosts();
        $this->render();
    }
}