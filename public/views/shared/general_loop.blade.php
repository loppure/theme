@foreach( $posts as $post)


  <?php switch($post->type) {
     case "loppure_polaroid":
         echo "loppure_polaroid";
         break;
     case "loppure_evento":
         echo "loppure_evento";
         break;
     case "loppure_reportage":
         echo "loppure_reportage";
         break;
     case "loppure_team":
         echo "loppure_team";
         break;
     default:
        echo "post";
 }
?>

@endforeach
