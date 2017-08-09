@foreach( $posts as $post)


  @switch($post->type)
     @case("loppure_polaroid")
         @include('shared.type-shared.loppure_polaroid')
         @break
     @case("loppure_evento")
         @include('shared.type-shared.loppure_evento')
         @break
     @case("loppure_reportage")
         @include('shared.type-shared.loppure_reportage')
         @break
     @case("loppure_team")
        @include('shared.type-shared.loppure_team')
        @break
     @default
        @include('shared.type-shared.post')
  @endswitch

@endforeach
