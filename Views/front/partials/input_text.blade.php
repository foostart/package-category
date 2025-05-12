<!------------------------------------------------------------------------------
| TITLE
| Input text element in form
|
|
|-------------------------------------------------------------------------------
| REQUIRED
| $name is input name
| $value is input value
| $label is input lable
| $placehover is placehover text
| $errors is error name
| $description is description text
|
|-------------------------------------------------------------------------------
| SYNTAX
|
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
    $type = empty($type) ? 'text' : 'password';
    //autocomplete
    $autocomplete = empty($autocomplete) ? '' : $autocomplete
?>
<!--/DATA-->

<!-- INPUT TEXT -->
<div class="form-group">

    <div class="input-group">

        <!--label-->
        @if($label)
            <label for="{!! $name !!}">{!! $label !!}</label>
        @endif

        <!--icon-->
        @if($icon)
            {!! $icon !!}
        @endif

        <!--element-->
        <input  type="{!! $type !!}"
                id="{!! $id !!}"
                name="{!! $name !!}"
                class="{!! $class !!}"
                placeholder="{!! $placeholder !!}"
                @if($required)
                   required
                @endif
                @if($autocomplete)
                    autocomplete = "{!! $autocomplete !!}"
                @endif
        >

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
