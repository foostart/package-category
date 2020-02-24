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
    $name           = empty($name)      ?   'undefined' : $name;
    //id
    $id             = empty($id)        ?   $name : $id;
    //value
    $value          = empty($value)     ?   $request->get($name):$value;
    //label
    $label          = empty($label)     ?   '' : $label;
    //place hover
    $placehover     = empty($placehover)?   $label : $placehover;
    //eror
    $errors         = empty($errors)    ?   '' : $errors;
    //description
    $description    = empty($description) ? '' : $description;
?>
<!--/DATA-->

<!--HEAD CSS-->
@section('head_css')
    {!! HTML::style('vendor/package-filemanager/css/lfm-custom.css') !!}
@endsection
<!--/HEAD CSS-->

<!--UPLOAD FILES-->
<div class='form-group'>

    {!! Form::label($name, $label) !!}

    <!--button upload-->
    <div class='image-control'>

        <p class='btn-image-control'>
            <button id="{!! $id !!}"
                    data-grid-view='list-uploaded-<?php echo $id ?>'
                    class="btn btn-primary btn-sm">

                    <i class="icon-ok icon-white"></i>
                    {!! trans("category-admin.buttons.upload") !!}
            </button>
        </p>

    </div>

    <!--description-->
    @if($description)
        <span class='input-text-description'>
            <blockquote class="quote-card">
                <p>{!! $description !!}</p>
            </blockquote>
        </span>
    @endif

    <!--list uploaded files-->
    <div class="list-uploaded-{!! $id !!}">

        <ul class="list-group">

            <!--item template-->
            <li class="item-template list-group-item">
                <input type='hidden' name='<?php echo $name ?>[]'>
                <span class='file-item'></span>
                <div class="pull-right delete-item">
                    <a href='javascript:;' class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
            </li>

            @if($value)
                <?php $items = json_decode($value);?>
                @if(is_array($items))
                @foreach($items as $item)
                    <li class="list-group-item">
                        <input type='hidden' name='<?php echo $name ?>[]' value='{!! $item !!}'>
                        <span class='file-item'>
                            <a href='{!! Url::to($item) !!}'>{!! $item !!}</a>
                        </span>
                        <div class="pull-right delete-item">
                            <a href='javascript:;' class="trash">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </div>
                    </li>
                @endforeach
                @endif
            @endif

        </ul>
    </div>

    <!--ERRORS-->
    @if ($errors->has($name))
        <ul class='alert alert-danger error-item'>
            @foreach($errors->get($name) as $error)
                @if($error)
                <li>
                    <span class='input-text-error'>{!! $error !!}</span>
                </li>
                @endif
            @endforeach
        </ul>
    @endif
    <!--/ERRORS-->


</div>
<!-- /UPLOAD FILES-->

@section('footer_scripts')
    @parent
    {!! HTML::script('vendor/package-filemanager/js/lfm-configs.js') !!}

    <script type='text/javascript'>

        $(document).ready(function(){
            if ($('#<?php echo $id ?>').length) {
                $('#<?php echo $id ?>').filemanager('file', {});
            }
        });

    </script>
@endsection