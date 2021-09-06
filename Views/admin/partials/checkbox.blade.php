<!--
| @TITLE
| Input text element in form
|
|-------------------------------------------------------------------------------
| @REQUIRED
| $name is checkbox name
| $value is checkbox value
| $label is checkbox lable
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
//value
$value = empty($value) ? $request->get($name) : $value;
//items
$items = empty($items) ? [] : $items;
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

    <!--label-->
@if($label)
    {!! Form::label($name, $label) !!}
@endif

<!--value-->
    @if($value)
        <span class='input-text-value' style="display: block;">{!! $value !!}</span>
    @endif

<!--checkbox-->
    @if($value && $items)
        @foreach($items as $item)
            <span class='checkbox-item' style="display: block;">
                {{ Form::checkbox($name, $value, null, ['class' => '']) }}
                <label for='{!! $name !!}' style="font-weight: normal;">{!! $item !!}</label>
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
