<?php wp_nonce_field($nonce[0], $nonce[1], false, true) ?>

<div class="form-wrap">

    @foreach( $custom_fields as $custom_field )
        <div class="form-field form-required">
            @if( $custom_field['type'] == 'checkbox' )

                <label for="{{ $prefix }}{{ $custom_field['name'] }}" style="display: inline">
                    <b>{{ $custom_field['title'] }}</b>
                </label>
                <input type="checkbox" name="{{ $prefix }}{{ $custom_field['name'] }}"
                       id="{{ $prefix }}{{ $custom_field['name'] }}" value="yes"

                       @if( $custom_field['content'] == 'yes' )
                        checked="checked"
                       @endif
                       style="width: auto">

            @elseif( $custom_field['type'] == 'textarea' || $custom_field['type'] == 'wysiwyg' )

                <label for="{{ $prefix}}{{ $custom_field['name'] }}">
                    <b>{{ $custom_field['title'] }}</b>
                </label>
                <textarea name="{{$prefix}}{{$custom_field['name']}}" id="{{$prefix}}{{$custom_field['name']}}"
                          columns="30" rows="3">{{ $custom_field['content'] }}
                </textarea>
                @if( $custom_field['type'] == 'wysiwyg' )
                    <script>
                        (function($){
                            $(document).ready(function() {
                                $("#{{$prefix}}{{$custom_field['name']}}").addClass('mceEditor');
                                if (typeof(tinyMCE) == 'object' && typeof(tinyMCE.execCommand) == 'function') {
                                    tinyMCE.execCommand('mceAddControl', false, "{{$prefix}}{{$custom_field['name']}}");
                                }
                            });
                        })(jQuery);
                    </script>
                @endif

            @else

                <label for="{{$prefix}}{{$custom_field['name']}}"><b>{{$custom_field[ 'title' ]}}</b></label>
                <input type="text" name="{{$prefix}}{{$custom_field['name']}}"
                       id="{{$prefix}}{{$custom_field['name']}}" value="{{$custom_field['content']}}">

            @endif

            @if( $custom_field['description'])
                <p>{{$custom_field['description']}}</p>
            @endif

        </div>
    @endforeach

</div>
