<!------------------------------------------------------------------------------
| TITLE
| Textarea element in form
|
|-------------------------------------------------------------------------------
| REQUIRED
| $name is textarea name
| $value is textarea value
| $label is textarea lable
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
    $name = empty($name)?'undefined':$name;
    //id
    $id = empty($id) ? $name : $id;
    //value
    $value = empty($value)?$request->get($name):$value;
    //label
    $label = empty($label) ? '' : $label;
    //placeholder
    $placeholder = empty($placeholder) ? $label : $placeholder;
    //eror
    $errors = empty($errors) ? '' : $errors;
    //description
    $description = empty($description) ? '' : $description;
    //rows
    $rows = empty($rows) ? 5 : $rows;
    //cols
    $cols = empty($cols) ? 5 : $cols;
    //class
    $class = empty($class) ? '' : $class;
    //tinymce
    $tinymce = empty($tinymce) ? 'my-editor' : $tinymce;
?>
<!--/DATA-->

<!-- INPUT TEXT -->
<div class="form-group">

    <!--element-->
    @if($label)
        <label for="{!! $id !!}">
            {!! $label !!}
        </label>
    @endif
    <br>

    <textarea id="{!! $id !!}"
              name="{!! $name !!}"
              rows="{!! $rows !!}"
              cols="{!! $cols !!}"
              class="form-control tinymce {!! $class !!}  {!! $tinymce !!}"
              placeholder="{!! $placeholder !!}">
        {!! $value !!}
    </textarea>
    <br><br>

    <!--description-->
    @if($description)
        <span class='input-text-description'>
            <blockquote class="quote-card">
                <p>
                {!! $description !!}
                </p>
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
<!-- /INPUT TEXT -->

<!--ADD SCRIPT TINYMCE-->
@if($tinymce)
    @section('footer_scripts')
        @parent
        <script src="{{ asset('packages/foostart/js/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('packages/foostart/js/tinymce/tinymce-configs.js') }}"></script>
    @endsection
@endif
<!--/ADD SCRIPT TINYMCE-->
