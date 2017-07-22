<?php

require_once __DIR__ . '/db.php';

class Loppure_stat
{

  public static function init()
  {
    add_action( 'admin_menu',         array( __CLASS__, 'addPage' ) );
    add_action( 'admin_footer',       array( __CLASS__, 'enqueue_script' ) );

    add_action( 'wp_ajax_create',     array( __CLASS__, 'create' ) );
    add_action( 'wp_ajax_drop',       array( __CLASS__, 'drop' ) );
    add_action( 'wp_ajax_fixtures',   array( __CLASS__, 'fixtures' ) );
    add_action( 'wp_ajax_show',       array( __CLASS__, 'show' ) );
    add_action( 'wp_ajax_test',       array( __CLASS__, 'test' ) );

    add_action( 'wp_ajax_give_love',  array( __CLASS__, 'public_love' ) );
    add_action( 'wp_ajax_nopriv_give_love',  array( __CLASS__, 'public_love' ) );
  }

  /**
   * Create our table
   */
  public static function create()
  {
    // check the nonce
    check_ajax_referer( 'loppure-ajax-nonce', 'security' );

    require_once __DIR__ . '/db.php';

    loppure_db::create();
    echo "Table successfully created";
  }

  /**
   * Drop our table
   */
  public static function drop()
  {
    // check the nonce
    check_ajax_referer( 'loppure-ajax-nonce', 'security' );

    require_once __DIR__ . '/db.php';

    loppure_db::drop();
    echo "Table successfully dropped";
  }

  /**
   * Pull data from custom table
   */
  public function show()
  {
    // pull all data from database
    require_once __DIR__ . '/db.php';

  }

  /**
   * for testing
   */
  public static function test()
  {
    require_once __DIR__ . '/db.php';
    echo "==g=\n\n";
    echo loppure_db::update_by( 1, 5 );
    echo "\n\n";
    die();
  }

  public static function fixtures()
  {
    // check the nonce
    check_ajax_referer( 'loppure-ajax-nonce', 'security' );

    require_once __DIR__ . '/db.php';

    $datas = array(
      array( 1, 2, 3, 4, 5, 6, 7, 8, 9 ),
      array( 43, 45, 46, 47, 56, 21, 8 ),
      array( 345, 543, 234, 876, 567, 44 ),
      array( 54,32,3232,454,3,2,677,8753 )
    );

    $ids = array();

    foreach ($datas as $data) {
      $ids[] = loppure_db::insert_data( $data );
    }

    echo "Fixtures loaded!\n";
    print_r($ids);
  }

  public static function public_love()
  {
    //var_dump($_POST);

    if ( !isset($_POST['post_id']) || !isset($_POST['myID']) )
    {
      die('Asshole');
    }

    require_once __DIR__ . '/db.php';

    $post_id = $_POST['post_id'];
    $clientID = $_POST['myID'];

    if ( $clientID == "none" )
    {
      //echo "creating a new id\n\n";
      $clientID = loppure_db::insert_data( array($post_id) );
      $minus = false;
    }

    else
    {
      //echo "updating user $clientID...\n\n";
      $clientID = intval($clientID);
      $post_id = intval($post_id);

      //var_dump($clientID);
      //var_dump($post_id);

      $minus = loppure_db::update_by( $clientID, $post_id );

      //echo "\n\n$log\n\n";
    }

    $love = get_post_meta( $post_id, 'op_love' );

    if (empty($love)) $love = array( 0 => 0 );

    $love = intval( $love[0] );

    $bk_love = $love;

    if ( empty($love) || $love == 0 )
    {
      $love = 1;
    }
    else {

      if ($minus)
      {
        $love = $love -1;
      }
      else
      {
        $love = $love +1;
      }
    }

    update_post_meta( $post_id, 'op_love', $love );

    $return = array(
      'yourID'      => $clientID,
      'list'        => loppure_db::get_list_by( $clientID ),
      'total'       => $love,

      // da rimuovere
      'log'         => array(
        'minus'     => $minus,
        'op_love_o' => $bk_love,
        'op_love_n' => get_post_meta( $post_id, 'op_love' )
      )
    );

    echo json_encode( $return );

    die();
  }

  public static function enqueue_script()
  {
    wp_enqueue_script( 'oppure-admin', get_template_directory_uri() . '/js/oppure-admin.js', array('jquery'), time(), true );
    wp_enqueue_style( 'oppure-admin-style', get_template_directory_uri() . '/admin.css', array(), time() );
  }

  public static function addPage()
  {
    //add_menu_page( 'Loppure stat', 'Stat', 'manage_option', 'loppure/stat', array( __CLASS__, 'renderPage' ), 'dashicons-chart-area', 1 );
    add_submenu_page( 'tools.php', 'L\'oppure stat', 'Statistiche', 'manage_options', 'tools.php', array( __CLASS__, 'renderPage' ) );
  }

  public static function renderPage()
  {
    echo '<input type="hidden" name="loppure-ajax-nonce" id="loppure-ajax-nonce" value="' . wp_create_nonce( 'loppure-ajax-nonce' ) . '" />';
    echo '<input type="hidden" name="loppure-ajax-uri" id="loppure-ajax-uri" value="' . admin_url( 'admin-ajax.php' ) . '" />';

    ?>

    <div class="wrapper">
      <h1 id="loppure_stat_page">Statistiche</h1>
      <button id="op-btn-create" class="op-btn ok">Create Table</button>
      <button id="op-btn-drop" class="op-btn danger">Drop Table</button>
      <button id="op-btn-load" class="op-btn warn">Load Fixture</button>
      <button id="op-btn-show" class="op-btn ok">Show</button>
      <button id="op-btn-test" class="op-btn warn">TEMP</button>

      <pre id="loppure_response">======= SERVER RESPONSE:</pre>

    </div>

    <?php
  }

  // check_ajax_referer( 'bk-ajax-nonce', 'security', false );
}

Loppure_stat::init();