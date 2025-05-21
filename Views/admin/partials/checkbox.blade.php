<!------------------------------------------------------------------------------
| TITLE
| Input checkbox element in form
|
|-------------------------------------------------------------------------------
| REQUIRED
| $name is checkbox name
| $value is checkbox value
| $label is checkbox lable
| $placehover is placehover text
| $errors is error name
| $description is description text
|
|-------------------------------------------------------------------------------
| SYNTAX
|
------------------------------------------------------------------------------->

<!--DATA-->
<?php
    //name
    $name = empty($name) ? 'undefined' : $name;
    //id
    $id = empty($id) ? $name : $id;
    //value
    $value = empty($value) ? '' : $value;
    //item
    $item = empty($item) ? [] : $item;
    //items
    $items = empty($items) ? [] : $items;
    //label
    $label = empty($label) ? '' : $label;
    //class
    $class = empty($class) ? '' : $class;
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

    <!--value-->
    @if($value)
        <span class='input-text-value' style="display: block;">{!! $value !!}</span>
    @endif

    @if(!empty($item))
        <span class='checkbox-item' style="display: block;">
            <input type="checkbox"
               name="{!! $name !!}"
               id="{!! $id !!}"
               value="{!! $value !!}"
            >
            @if($label)
                <label for='{!! $name !!}'>{!! $label !!}</label>
            @endif
        </span>
    @elseif(!empty($items))
        @foreach($items as $_key => $_value)
            <span class="checkbox-item" style="display: block;">
                <input type="checkbox"
                    name="{!! $name !!}[]"
                    value="{!! $_key !!}"
                    id="{!! $name . '_' . $_key !!}"
                   @if(is_array($value) && in_array($_key, $value)) checked @endif
                >
                @if($label)
                    <label for="{!! $name . '_' . $_key !!}">{!! $_value !!}</label>
                @endif`
            </span>
        @endforeach

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
