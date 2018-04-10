<!--
| @TITLE
| Label
|
|-------------------------------------------------------------------------------
| @REQUIRED
| $value is label value
| $label is label lable
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @SYNTAX
|
------------------------------------------------------------------------------->

<!--DATA-->
<?php
    //value
    $value = empty($value)?$request->get($name):$value;
    //label
    $label = empty($label) ? '' : $label;
?>
<!--/DATA-->

<!-- LABEL -->
<div class="form-group">

    <!--element-->
    {!! Form::label($name, $label) !!}


     <!--value-->
    @if($value)
        <span class='input-text-value' style="display: block;">{!! $value !!}</span>
    @endif

    <!--description-->
    @if($description)
    <span class='input-text-description'>
        <blockquote class="quote-card">
            <p>{!! $description !!}</p>
        </blockquote>
    </span>
    @endif

</div>
<!-- /LABEL -->