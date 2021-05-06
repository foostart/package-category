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
    $name = empty($name) ? 'undefined' : $name;
    //id
    $id = empty($id) ? $name : $id;
    //value
    $value = empty($value) ? $request->get($name) : $value;
    //label
    $label = empty($label) ? '' : $label;
    //icon
    $icon = empty($icon) ? '' : $icon;
    //place hover
    $placeholder = empty($placeholder) ? $label : $placeholder;
    //required
    $required = empty($required) ? '' : 'required';
    //errors
    $errors = empty($errors) ? '' : $errors;
    //description
    $description = empty($description) ? '' : $description;
    //class
    $class = empty($class) ? '' : $class;
    //type
    $type = empty($type) ? '':'password';
?>
<!--/DATA-->

<!-- INPUT TEXT -->
<div class="form-group">

    <div class="input-group">

        <!--label-->
        @if($label)
            {!! Form::label($name, $label) !!}
        @endif

        <!--icon-->
        @if($icon)
            {!! $icon !!}
        @endif

        <!--element-->
        @if($type)
        {!! Form::password($name, [ 'id' => $id,
                                    'class' => 'form-control '.$class,
                                    'placeholder' => $placeholder,
                                    $required,
                                    'autocomplete' => 'off'])
        !!}
        @else
        {!! Form::text($name, '', [ 'id' => $id,
                                    'class' => 'form-control '.$class,
                                    'placeholder' => $placeholder,
                                    $required,
                                    'autocomplete' => 'off'])
        !!}
        @endif
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
<!-- /INPUT TEXT -->