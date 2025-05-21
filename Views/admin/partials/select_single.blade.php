<!------------------------------------------------------------------------------
| TITLE
| Select single item in form
|
|-------------------------------------------------------------------------------
| REQUIRED
| $name is select name
| $items is list of items
| $label is select label
| $label is input lable
| $placehover is placehover text
| $errors is error name
| $description is description text
|
|-------------------------------------------------------------------------------
| DESCRIPTION
|
|____________________________________________________________________________-->

<!--DATA-->
<?php
    //name
    $name = empty($name)?'undefined':$name;

    //id
    $id = empty($id) ? $name : $id;

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

    //class
    $class = empty($class) ? '' : $class;
?>
<!--/DATA-->

<!-- SELECT -->
<div class="form-group">

    @if($label)
        <label for="{!! $name !!}">{!! $label !!}</label>
    @endif


    <select name="{!! $name !!}" class="form-control {!! $class !!}" >

        @if($placehover)
            <option value="">{!! $placehover !!}</option>
        @endif
        @if($items)
            @foreach($items as $_value => $_label)
                <option value="{!! $_value !!}" @if($_value == $value) selected @endif>
                    {!! $_label !!}
                </option>
            @endforeach
        @endif

    </select>

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
<!-- /SELECT -->
