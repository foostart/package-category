<!------------------------------------------------------------------------------
| TITLE
| Input text element in form
| Input hidden
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
    //hidden
    $hidden = empty($hidden) ? false : true;
    //name
    $name = empty($name) ? 'undefined' : $name;
    //id
    $id = empty($id) ? $name : $id;
    //value
    $value = empty($value) ? $request->get($name) : $value;
    //label
    $label = empty($label) ? '' : $label;
    //class
    $class = empty($class) ? '' : $class;
    //place hover
    $placehover = empty($placehover) ? $label : $placehover;
    //errors
    $errors = empty($errors) ? '' : $errors;
    //description
    $description = empty($description) ? '' : $description;
?>
<!--/DATA-->

<!-- INPUT TEXT -->
<div class="form-group">

    @if($label)
        {{ html()->label($label)->for($name) }}
    @endif

    @if($hidden)
        <input type="hidden"
               id="{!! $id !!}"
               value="{!! $value !!}"
        >
    @else
        <input type="text"
               id="{!! $id !!}"
               name="{!! $name !!}"
               value="{!! $value !!}"
               class="{!! $class !!}"
               placehover="{!! $placehover !!}"
        >
    @endif

    <!-- DESCTIPTION -->
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
