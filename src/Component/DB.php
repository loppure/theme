<?php

namespace Loppure\Component;

class DB
{
    private $table_name;
    
    public function __construct()
    {
        global $wpdb;
        
        $this->table_name = $wpdb->prefix . 'loppure_stat';
    }

    public function create()
    {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $sql = $wpdb->prepare("
CREATE TABLE %s (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  list varchar(255),
  UNIQUE KEY id (id)
) %s
", $this->table_name, $charset_collate);

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        dbDelta($sql);
    }

    public function drop()
    {
        global $wpdb;

        return $wpdb->query(
            $wpdb->prepare("DROP TABLE IF EXISTS %s", $this->table_name));
    }

    public function updateBy($id, $post_id)
    {
        global $wpdb;

        $id = intval($id);
        $post_id = intval($post_id);

        $list = $this->getListBy($id);

        $list = array_map(function($item) {
            return intval($item);
        }, $list);

        if (in_array($post_id, $list)) {
            $list = array_diff($list, array($post_id));
            $minus = true;
        } else {
            $list[] = $post_id;
            $minus = false;
        }

        $wpdb->update(
            $this->table_name(),          // TABLE
            ['list' => serialize($list)], // [data]
            ['id' => $id]                 // WHERE
        );

        return $minus;
    }

    /**
     * Aggiunge dei dati.
     *
     * (Generico) I dati passati vengono aggiunti come nuova riga del database.
     *
     * @param Array $data Un array con i dati da inserire.
     */
    public function insertData($data)
    {
        global $wpdb;

        $wpdb->insert(
            $this->table_name,
            ['list' => serialize($data)]
        );

        return $wpdb->insert_id;
    }

    public function getListBy($id)
    {
        global $wpdb;

        $list = $wpdb->get_var(
            $wpdb->prepare("
SELECT list
FROM %s
WHERE id=%d
", $this->table_name, $id));

        return unserialize($list);
    }
}