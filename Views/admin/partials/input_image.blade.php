<!--
| @TITLE
| Input text element in form
|
|-------------------------------------------------------------------------------
| @REQUIRED
| $name is input name
| $value is input value
| $label is input lable
| $placehover is placehover text
| $errors is error name
| $description is description text
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @SYNTAX
|
------------------------------------------------------------------------------->

<!--DATA-->
<?php
    //name
    $name = empty($name)?'undefined':$name;
    //value
    $image_empty = URL::to('packages/foostart/images/image-temp-220.png');
    $image_url = empty($value)?$image_empty:URL::to($value);
    //label
    $label = empty($label) ? '' : $label;
    //place hover
    $placehover = empty($placehover) ? $label : $placehover;
    //eror
    $errors = empty($errors) ? '' : $errors;
    //value
    $value = empty($value)?$request->get($name):$value;
    //description
    $description = empty($description) ? '' : $description;
    //lfm_config
    $lfm_config = empty($lfm_config) ? FALSE : TRUE;
?>
<!--/DATA-->

<!-- INPUT IMAGE -->

<div class='form-group'>
    {!! Form::label($name, $label) !!}

    <!--thumbnail-->
    <div class='image-control'>

        <img id='_preview' class="thumbnail box-center margin-top-20" alt="No image" src="{!! $image_url !!}">

        <!--buttons-->
        <p class='btn-image-control'>
            <!--remove/undo-->
            <button id='lfm-remove'
                    data-input='_image'
                    data-preview='_preview'
                    data-on='remove'
                    data-image-url='{!! $image_url !!}'
                    data-image-empty='{!! $image_empty !!}'
                    data-image-dir='{!! $value !!}'
                    data-label-remove='{!! trans("category-admin.buttons.remove") !!}'
                    data-label-undo='{!! trans("category-admin.buttons.undo") !!}'
                    class='btn btn-sm'
                    >
                <i class="icon-remove"></i>{!! trans("category-admin.buttons.remove") !!}
            </button>
            <!--upload-->
            <button id="lfm-image"
                    data-input='_image'
                    data-preview='_preview'
                    data-image-dir='{!! $value !!}'
                    data-control='lfm-remove'
                    class="btn btn-primary btn-sm">
                <i class="icon-ok icon-white"></i>{!! trans("category-admin.buttons.upload") !!}
            </button>
        </p>
        {!! Form::hidden($name, $value, ['id' => '_image', 'data-control' => 'lfm-remove']) !!}
    </div>

    <!--description-->
    @if($description)
        <span class='input-text-description'>
            <blockquote class="quote-card">
                <p>{!! $description !!}</p>
            </blockquote>
        </span>
    @endif

    <!--errors-->
    @if ($errors->has($name))
        <ul class='error-item'>
            @foreach($errors->get($name) as $error)
                @if($error)
                <li>
                    <span class='input-text-error'>{!! $error !!}</span>
                </li>
                @endif
            @endforeach
        </ul>
    @endif


</div>

<!-- /INPUT IMAGE -->

@section('footer_scripts')
    @parent
    @if($lfm_config)
        {!! HTML::script('vendor/package-filemanager/js/lfm-configs.js') !!}
    @endif
@endsection