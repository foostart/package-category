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
    $name = empty($name)?'undefined[]':$name;
    //id
    $id = empty($id)?$name:$id;
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
    //more element
    $items = empty($items) ? '' : $items;
    //with
    $withs = [
        'counter' => '3%',
        'id' => '3%',
        'value' => '60%',
        'status' => '25%',
        'operations' => '15%',
    ];
    //counter
    $counter = 1;

?>
<!--/DATA-->

<!-- INPUT TEXT -->
<div class="form-group {{$name}}">

    <!--element-->
    {!! Form::label($name, $label) !!}

    <!--description-->
    @if($description)
        <span class='input-text-description'>
            <blockquote class="quote-card">
                <p>{!! $description !!}</p>
            </blockquote>
        </span>
    @endif

    <div class="input_fields_wrap">

        <span class="btn btn-info regular_expression_add"  value="Add new regular expression">
            +
        </span>


            <table class="table table-hover">

                <thead>
                <tr style="height: 50px;">

                    <!--COUNTER-->
                    <th class="hidden-xs"  style='width:{{ $withs['counter'] }}'>
                        {{ trans($plang_admin.'.columns.counter') }}
                    </th>
                    <!--ID-->
                    <th class="hidden-xs"  style='width:{{ $withs['id'] }}'>
                        {{ trans($plang_admin.'.columns.id') }}
                    </th>
                    <!--VALUE-->
                    <th class="hidden-xs"  style='width:{{ $withs['value'] }}'>
                        {{ trans($plang_admin.'.columns.regular_expression_value') }}
                    </th>
                    <!--STATUS-->
                    <th class="hidden-xs"  style='width:{{ $withs['status'] }}'>
                        {{ trans($plang_admin.'.columns.status') }}
                    </th>
                    <!--OPERATIONS-->
                    <th class="hidden-xs"  style='width:{{ $withs['operations'] }}'>
                        {{ trans($plang_admin.'.columns.operations') }}
                    </th>
                <tr>
                </thead>
                <tbody>
                @if($items)
                @foreach($items as $_item)
                    <tr class="{{$name}}_item">
                        <!--COUNTER-->
                        <td><?php echo $counter; $counter++ ?></td>
                        <!--ID-->
                        <td><?php echo $_item->regular_expression_id ?></td>
                        <!--VALUE-->
                        <td>
                            {!! Form::text($_name, $_item->regular_expression_value, ['class' => 'form-control', 'placeholder' => $placehover]) !!}
                        </td>
                        <!--STATUS-->
                        <td>
                            <!--STATUS-->
                            @include('package-category::admin.partials.select_single', [
                                'name' => 're_status[]',
                                'label' => NULL,
                                'value' => @$_item->status,
                                'items' => $status,
                                'description' => NULL,
                            ])
                            <!--/STATUS-->
                        </td>
                        <!--OPERATIONS-->
                        <td>
                            <!--copy-->
                            <a href="#" class="margin-left-5 regular_expression_delete">
                                <i class="fa fa-files-o f-tb-icon" aria-hidden="true"></i>
                            </a>

                            <!--delete-->
                            <a href="#" class="margin-left-5 regular_expression_delete">
                                <i class="fa fa-trash-o f-tb-icon"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr class="{{$name}}_item">
                        <!--COUNTER-->
                        <td><?php echo $counter; $counter++ ?></td>
                        <!--ID-->
                        <td></td>
                        <!--VALUE-->
                        <td>
                            {!! Form::text($_name, null, ['class' => 'form-control', 'placeholder' => $placehover]) !!}
                        </td>
                        <!--STATUS-->
                        <td>
                            <!--STATUS-->
                        @include('package-category::admin.partials.select_single', [
                            'name' => 're_status[]',
                            'label' => NULL,
                            'value' => NULL,
                            'items' => $status,
                            'description' => NULL,
                        ])
                        <!--/STATUS-->
                        </td>
                        <!--OPERATIONS-->
                        <td>
                            <!--copy-->
                            <a href="#" class="margin-left-5 regular_expression_delete">
                                <i class="fa fa-files-o f-tb-icon" aria-hidden="true"></i>
                            </a>

                            <!--delete-->
                            <a href="#" class="margin-left-5 regular_expression_delete">
                                <i class="fa fa-trash-o f-tb-icon"></i>
                            </a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>

    </div>



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

@section('footer_scripts')
    @parent

    <script type='text/javascript'>
        $(document).ready(function() {
            /////
            //Delete item
            $('.regular_expression_delete').click(function() {
                $(this).parent().parent().remove();
            });
            //Add new item
            $('.regular_expression_add').click(function() {
                var item = $('.regular_expression_item:last').clone(true, true);
                item.find('td:eq(0)').text('');
                item.find('td:eq(1)').text('');
                item.appendTo('.regular_expression tbody');
            });

        });
    </script>
@endsection
