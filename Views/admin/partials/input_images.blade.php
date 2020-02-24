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
    //id
    $id = empty($id)?$name.'[]' : $id.'[]';
    //text
    $attr_description = empty($attr_description)?$name.'[]' : $attr_description.'[]';
    //author
    $attr_author = empty($attr_author)?$name.'[]' : $attr_author.'[]';
    //value
    $image_empty = URL::to('packages/foostart/images/image-temp-220.png');
    $image_url = empty($value)?$image_empty:URL::to($value);
    //label
    $label = empty($label) ? '' : $label;
    //place hover
    $placehover = empty($placehover) ? $label : $placehover;
    //eror
    $errors = empty($errors) ? '' : $errors;
    //description
    $description = empty($description) ? '' : $description;
?>
<!--/DATA-->

@section('head_css')
    {!! HTML::style('vendor/package-filemanager/css/lfm-custom.css') !!}
    {!! HTML::style('packages/foostart/css/jquery-1.12.1-ui.css') !!}
@endsection
<!-- INPUT IMAGE -->
<div class='form-group'>
    {!! Form::label($name, $label) !!}

    <!--thumbnail-->
    <div class='image-control'>

        <!--buttons-->
        <p class='btn-image-control'>
            <!--upload-->
            <button id="lfm-images"
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

    <!--list uploaded files-->
    <div class="list-uploaded-images">

        <ul id="sortable" class="list-group">
            <!--template-->
            <li class="ui-state-default  list-group-item item-template">
                <input type='hidden' name='<?php echo $id ?>' value=''>
                <img class='thumbnail box-center margin-top-20' src=''>
                <textarea name="<?php echo $attr_description ?>" class="" rows="5" placeholder="Introduction text" cols="29"></textarea>
                <textarea name="<?php echo $attr_author ?>" class="" rows="5" placeholder="Introduction text" cols="29"></textarea>

                <div class="pull-right delete-item">
                    <a href='javascript:;' class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
            </li>

            @if($value)
                <?php $items = json_decode($value);?>
                @foreach($items as $item)

                    <li class="ui-state-default list-group-item">
                        <input type='hidden' name='<?php echo $id ?>' value='{!! $item->image !!}'>
                        <img class='thumbnail box-center margin-top-20' src='{!! Url::to($item->image) !!}'>

                        <textarea name="<?php echo $attr_description ?>" class=" " rows="5" placeholder="Introduction text"  cols="29">
                            @if(!empty($item->description))
                                {!! $item->description !!}
                            @endif
                        </textarea>

                        <textarea name="<?php echo $attr_author ?>" class=" " rows="5" placeholder="Introduction text"  cols="29">
                            @if(!empty($item->author))
                                {!! $item->author !!}
                            @endif
                        </textarea>

                        <div class="pull-right delete-item">
                            <a href='javascript:;' class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                        </div>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>

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
    {!! HTML::script('vendor/package-filemanager/js/lfm-configs.js') !!}
    {!! HTML::script('packages/foostart/js/jquery-ui-1.12.1.min.js') !!}
    <script>
        $( function() {
            $( "#sortable" ).sortable({
                appendTo: document.body,
                axis: "y"
            });
            $( "#sortable" ).disableSelection();
        } );
    </script>
@endsection