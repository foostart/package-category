<!--
| @TITLE
| Textarea element in form
|
|-------------------------------------------------------------------------------
| @REQUIRED
| $name is textarea name
| $value is textarea value
| $label is textarea lable
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
    $value = empty($value)?$request->get($name):$value;
    //label
    $label = empty($label) ? '' : $label;
    //place hover
    $placehover = empty($placehover) ? $label : $placehover;
    //eror
    $errors = empty($errors) ? '' : $errors;
    //description
    $description = empty($description) ? '' : $description;
    //rows
    $rows = empty($rows) ? 5 : $rows;
    //tinymce
    $tinymce = !$tinymce ? '' : 'my-editor';
?>
<!--/DATA-->

<!-- INPUT TEXT -->
<div class="form-group">

    <!--element-->
    {!! Form::label($name, $label) !!}
    {!! Form::textarea ($name, $value, ['class' => 'form-control tinymce '.$tinymce, 'rows' => $rows, 'placeholder' => $placehover]) !!}
    <!--description-->
    @if($description)
        <span class='input-text-description'>
            <blockquote class="quote-card">
                <p>
                {!! $description !!}
                </p>
            </blockquote>
        </span>
    @endif

    <!--errors-->
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
</div>
<!-- /INPUT TEXT -->

<!--ADD SCRIPT TINYMCE-->
@if($tinymce)
    @section('footer_scripts')
        @parent
        {!! HTML::script('packages/foostart/js/tinymce/tinymce.min.js') !!}
        {!! HTML::script('packages/foostart/js/tinymce/tinymce-configs.js') !!}
    @endsection
@endif
<!--/ADD SCRIPT TINYMCE-->

