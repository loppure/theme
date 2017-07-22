<?php

add_action('wp_ajax_nopriv_get_comment', 'loppure_get_comment');
add_action('wp_ajax_get_comment',        'loppure_get_comment');

function loppure_get_comment() {
  $id = $_POST['post_id'];
  $comments = get_comments(array(
    'post_id' => $id,
    'status'  => 'approve',
    'order'   => 'ASC'
  ));

  $result = array();

  foreach ($comments as $comment) {
    $result[] = array(
      'comment_ID'      => $comment->comment_ID,
      'comment_author'  => $comment->comment_author,
      'comment_content' => $comment->comment_content,
      'comment_date'    => $comment->comment_date,
      'comment_parent'  => $comment->comment_parent,
      'comment_post_ID' => $comment->comment_post_ID
    );
  }

  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  echo json_encode($result);

  die();
}

add_action('comment_post', 'loppure_it_theme_ajaxify_comments', 20, 2);
function loppure_it_theme_ajaxify_comments($comment_ID, $comment_status)
{
  if (!empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // AJAX! Yeee ^^
    switch ($comment_status) {
      case '0': // unapproved
        //notify
        wp_notify_moderator($comment_ID);
      case '1': // approved
        echo "success";
        $commentdata = &get_comment($comment_ID, ARRAY_A);
        $post = &get_post($commentdata['comment_post_ID']);
        wp_notify_postauthor($comment_ID, $commentdata['comment_type']);
        break;

      default:
        echo "error";
    }
    exit;
  }
}