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
| @DESCRIPTION
|
|
|
|_______________________________________________________________________________
-->

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
?>
<!--/DATA-->

<!-- INPUT TEXT -->
<div class="form-group">

    <!--element-->
    {!! Form::label($name, $label) !!}
    {!! Form::text($name, $value, ['class' => 'form-control', 'placeholder' => $placehover]) !!}

    <!--description-->
    @if($description)
        <span class='input-text-description'>{!! $description !!}</span>
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
<!-- /INPUT TEXT -->