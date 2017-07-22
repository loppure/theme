<meta charset="UTF-8">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php
  if ( is_single() ) {
    single_post_title('', true);
  }
  else {
    bloginfo('name'); echo " - "; bloginfo('description');
  }
?>" />

<?php // Apple's metatag ?>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name') ?>">

<?php // Chrome for android support to add to homescreen ?>
<meta name="mobile-web-app-capable" content="yes">

<!-- Open Graph -->
<?php if (is_single()) {
  setup_postdata( $post );
?>
  <meta property="og:url" content="<?php the_permalink() ?>"/>
  <meta property="og:title" content="<?php single_post_title(''); ?>" />
  <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="<?php
    if (has_post_thumbnail( $post->ID ) ) {
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
      echo $image[0];
    } ?>" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@Loppure">
  <meta name="twitter:title" content="<?php single_post_title(''); ?>">
  <meta name="twitter:description" content="<?php echo get_the_excerpt(); ?>">
  <meta name="twitter:image" content="<?php
    if (has_post_thumbnail( $post->ID ) ) {
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
      echo $image[0];
    } ?>">

  <?php } else { ?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
  <meta property="og:description" content="<?php bloginfo('description'); ?>" />
  <meta property="og:type" content="blog" />
  <meta property="og:image" content="http://www.loppure.it/wp-content/uploads/2015/04/Senza-titolo-1.jpg" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@Loppure">
  <meta name="twitter:title" content="<?php bloginfo('name'); ?>">
  <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
  <meta name="twitter:image" content="http://www.loppure.it/wp-content/uploads/2015/04/Senza-titolo-1.jpg">
<?php } ?>

      <link rel="profile" href="http://gmpg.org/xfn/11">
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

      <!--[if lt IE 9]>
          <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]>-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700|Merriweather:400,400i,700,700i" rel="stylesheet">
