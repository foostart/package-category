<!--
| @TITLE
| Input text element in form
|
|-------------------------------------------------------------------------------
| @REQUIRED
| $name is radio name
| $value is radio value
| $label is radio lable
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
    $value = !empty($value)?$value:0;

    //items
    $items = empty($items)?[]:$items;
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
    @if($label)
    {!! Form::label($name, $label) !!}
    @endif

    @if($items)
        @foreach($items as $key => $item)
            <span class='radio-item' style="display: block;">
                {{ Form::radio($name, $key, $key==$value?true:false, ['class' => '', 'id' => $name.'-'.$key]) }}
                <label for='{!! $name."-".$key !!}' style="font-weight: normal;">{!! $item !!}</label>
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