<!--
| @TITLE
| Select single item in form
|
|-------------------------------------------------------------------------------
| @REQUIRED
| $name is select name
| $items is list of items
| $label is select label
| $label is input lable
| $placehover is placehover text
| $errors is error name
| $description is description text
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @DESCRIPTION
|
|_______________________________________________________________________________
-->

<!--DATA-->
<?php
    //name
    $name = empty($name)?'undefined':$name;

    //items
    $items = empty($items)?[]:$items;

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
?>
<!--/DATA-->

<!-- CATEGORY LIST -->
<div class="form-group">

    <!--element-->
    {!! Form::label($name, $label) !!}
    @if($items)
        {!! Form::select($name, $items, $value, ['class' => 'form-control',  'placeholder' => $placehover]) !!}
    @endif

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
<!-- /CATEGORY LIST -->