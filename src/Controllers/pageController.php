<?php

namespace Loppure\Controllers;

use \StdClass;

class pageController extends Controller
{
    public function __construct()
    {
        $template_name = get_page_template_slug();
        preg_match('/.*\/(.*)\.php/', $template_name, $template_name);

        $template_name = $template_name[1];

        if($template_name == '') {
          parent::__construct('Page:index');
        } else {
          parent::__construct('Page:'. $template_name);
        }
        $this->data['template_name'] = $template_name;

        $this->render();
    }
}
