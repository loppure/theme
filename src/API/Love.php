<?php

namespace Loppure\API;

use Theine\Component\AbstractAjax;
use Loppure\Component\DB;

class Love extends AbstractAjax
{
    /**
     * Contiene l'istamza della classe DB.
     *
     * @var \Loppure\Component\DB
     */
    private $db;

    public function __construct()
    {
        parent::__construct('love');

        $this->db = new DB();

        add_action('wp_footer', [$this, 'footer']);
    }

    public function validate()
    {
        $this->action();
    }

    public function action()
    {
        // do stuff
        $this->love();
    }

    public function footer()
    {
        ?>
        <input type="hidden" value="<?php echo admin_url('admin-ajax.php'); ?>" id="ajax-url">
        <?php
    }

    private function create()
    {
        $this->db->create();
    }

    private function drop()
    {
        $this->db->drop();
    }

    private function show()
    {
        // pull all the data from db
        // work in progress
    }

    private function love()
    {
        if (!isset($_GET['post_id']) || !isset($_GET['myID'])) {
            wp_send_json(["message" => "die"]);
            die('');
        }

        $post_id = $_GET['post_id'];
        $client_id = $_GET['myID'];

        $minus = false;

        if ($client_id == "none") {
            // creating a new id

            $client_id = $this->db->insert_data([$post_id]);
        } else {
            // or update the current user

            $client_id = intval($client_id);
            $post_id = intval($post_id);

            $minus = $this->db->updateBy($client_id, $post_id);
        }

        $love = get_post_meta($post_id, 'op_love');

        $love = empty($love) ? array(0) : $love;

        $love = intval($love[0]);

        $love = $minus ? $love - 1 : $love + 1;

        update_post_meta($post_id, 'op_love', abs($love));

        wp_send_json(array(
            'yourID'  => $client_id,
            'list'    => $this->db->getListBy($client_id),
            'total'   => $love
        ));
    }
}
