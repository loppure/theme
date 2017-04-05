<?php

namespace Loppure\Component\Widgets;

use \WP_Widget;
use Theine\View\View;

class AbstractWidget extends WP_Widget
{
    /**
     * Contiene l'istanza della classe view
     *
     * @var \Theine\View\View
     */
    protected $view;

    /**
     * Contiene l'indirizzo alla view
     *
     * @var string
     */
    protected $path_view;

    /**
     * Contiene i dati da passare alla view
     *
     * @var array
     */
    protected $data;

    /**
     * Contiene il nome della classe
     *
     * @var string
     */
    protected $class_name;
    
    public function __construct($view, $id_base, $name, $option = array(), $control_option = array())
    {
        parent::__construct($id_base, $name, $option, $control_option);
        $this->path_view = $view;
        $this->data = array();
    }

    public function run() {
        add_action('widgets_init', [$this, 'register']);
    }

    public function register()
    {
        register_widget($this->class_name);
    }

    protected function render($view = '')
    {
        $view = empty($view) ? $this->path_view : $view;
        $this->view = new View($view, $this->data);
    }
}