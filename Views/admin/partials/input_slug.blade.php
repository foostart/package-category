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
//ref
$ref = empty($ref) ? $name : $ref;
//value
$value = empty($value) ? $request->get($name) : $value;
//label
$label = empty($label) ? '' : $label;
//place hover
$placehover = empty($placehover) ? $label : $placehover;
//eror
$errors = empty($errors) ? '' : $errors;
//description
$description = empty($description) ? '' : $description;
//hidden

$hidden = empty($hidden) ? false : true;
?>
<!--/DATA-->

<!--element-->
@if($hidden)
    {!! Form::hidden($name, $value, ['id' => $id]) !!}
@else
    <!-- INPUT TEXT -->
    <div class="form-group">
    {!! Form::label($name, $label) !!}
    {!! Form::text($name, $value, ['id' => $id, 'class' => 'form-control', 'placeholder' => $placehover]) !!}
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
<!-- /INPUT TEXT -->
@endif




<!-- /INPUT IMAGE -->
@section('footer_scripts')
    @parent
    {!! HTML::script('packages/foostart/js/slugit.js') !!}

    <script type='text/javascript'>
        $(document).ready(function () {
            $('#<?php echo $ref ?>').slugIt({
                output: '#<?php echo $id ?>'
            });
        });
    </script>
@endsection
