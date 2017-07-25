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


      <!-- Opera Speed Dial Favicon -->
        <link rel="icon" type="image/png" href="/speeddial-160px.png" />

      <!-- Standard Favicon -->
        <link rel="icon" type="image/x-icon" href="/favicon.ico" />

      <!-- For iPhone 4 Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">

      <!-- For iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">

      <!-- For iPhone: -->
        <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-57x57-precomposed.png">
        <link rel="icon" type="image/x-icon" href="http://example.com/favicon.ico" />
        <link rel="icon" type="image/png" href="http://example.com/favicon.png" />
        <link rel="icon" type="image/gif" href="http://example.com/favicon.gif" />

        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1874579112860759'); // Insert your pixel ID here.
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1874579112860759&ev=PageView&noscript=1"
        /></noscript>
        <!-- DO NOT MODIFY -->
        <!-- End Facebook Pixel Code -->

        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83275908-1', 'auto');
  ga('send', 'pageview');

</script>

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700|Merriweather:400,400i,700,700i" rel="stylesheet">
