<?php

/**
 * @class loppure_db: espone delle api CRUD (quasi) per la gestione del database per le statistiche
 */
class loppure_db
{
  public static function get_table_name()
  {
    global $wpdb;
    return $wpdb->prefix . "loppure_stat";
  }

  public static function create()
  {
    global $wpdb;

    #var_dump($wpdb);

    $charset_collate = $wpdb->get_charset_collate();
    $table_name = self::get_table_name();

    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      list varchar(255),
      UNIQUE KEY id (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  }

  public static function drop()
  {
    global $wpdb;

    $table_name = self::get_table_name();

    return $wpdb->query("DROP TABLE IF EXISTS $table_name");
  }

  /**
   *
   */
  public static function update_by( $id, $post_id )
  {
    global $wpdb;

    $id = intval( $id );
    $post_id = intval( $post_id );

    $table_name = self::get_table_name();

    $list = self::get_list_by( $id );

    $realList = array();

    foreach ($list as $item) {
      $realList[] = intval( $item );
    }

    $list = $realList;

    // se il post è presente, lo rimuove
    if ( in_array( $post_id, $list ) )
    {
      $list = array_diff( $list, array( $post_id ) );
      $minus = true;
    }
    // altrimenti lo aggiunge
    else
    {
      $list[] = $post_id;
      $minus = false;
    }

    $wpdb->update(
      //tabella
      self::get_table_name(),

      //data
      array( 'list' => serialize( $list ) ),

      //WHERE
      array( 'id' => $id )
    );

    return $minus;
  }

  /**
   * Aggiunge dei dati (generico).
   * I dati passati vengono aggiunti come nuova riga del database
   *
   * @var $data Array Un array con i dati da inserire. Es: array( 187, 234, 533, ... )
   */
  public static function insert_data( $data )
  {
    global $wpdb;
    $table_name = self::get_table_name();

    //echo "\ninjecting data...\n";

    $wpdb->insert(
      $table_name,
      array(
        'list' => serialize( $data ),
      )
    );

    //echo "\nData injected\n";

    return $wpdb->insert_id;
  }

  public static function get_list_by( $id )
  {
    global $wpdb;

    $table_name = self::get_table_name();

    $list = $wpdb->get_var(
      $wpdb->prepare(
        "
        SELECT list
        FROM $table_name
        WHERE id=%d
        ", $id
      )
    );

    return unserialize( $list );
  }
}

// loppure_db::create();