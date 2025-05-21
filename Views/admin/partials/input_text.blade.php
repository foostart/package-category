<!------------------------------------------------------------------------------
| TITLE
| Input type: text, hidden
|
|
|-------------------------------------------------------------------------------
| REQUIRED
| $name is input name
| $value is input value
| $label is input label
| $placeholder is placeholder text
| $errors is error name
| $description is description text
|
|-------------------------------------------------------------------------------
| SYNTAX
|
|
------------------------------------------------------------------------------->

<!--PARAMS-->
<?php
    //hidden
    $hidden         = empty($hidden)        ? false         : true;
    //name
    $name           = empty($name)          ? 'undefined'   : $name;
    //id
    $id             = empty($id)            ? $name         : $id;
    //value
    $value          = empty($value)         ? ''            : $value;
    //type
    $type           = empty($type)         ? 'text'         : $type;
    //label
    $label          = empty($label)         ? ''            : $label;
    //class
    $class          = empty($class)         ? ''            : $class;
    //place hover
    $placeholder    = empty($placeholder)   ? $label        : $placeholder;
    //errors
    $errors         = empty($errors)        ? ''            : $errors;
    //description
    $description    = empty($description)   ? ''            : $description;
?>
<!--/PARAMS-->

<!-- INPUT TEXT -->
<div class="form-group">

    @if($label)
        <label for="{!! $name !!}">{!! $label !!}</label>
    @endif

    @if($hidden)
        <input type="hidden"
               id="{!! $id !!}"
               name="{!! $name !!}"
               value="{!! $value !!}"
        >
    @else
        <input type="{!! $type !!}"
               id="{!! $id !!}"
               name="{!! $name !!}"
               value="{!! $value !!}"
               class="{!! $class !!}"
               placehover="{!! $placeholder !!}"
        >
    @endif

    <!-- DESCRIPTION -->
    @if($description)
        <span class='input-text-description'>
            <blockquote class="quote-card">
                <p>{!! $description !!}</p>
            </blockquote>
        </span>
    @endif

    <!-- ERRORS -->
    @if (!empty($errors) && $errors->has($name))
        <ul class='alert alert-danger error-item'>
            @foreach($errors->get($name) as $error)
                @if($error)
                    <li>
                        <span class='input-text-error'>
                            {!! $error !!}
                        </span>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
</div>
<!-- /INPUT TEXT -->
