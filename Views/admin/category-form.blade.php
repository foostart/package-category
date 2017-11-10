<!------------------------------------------------------------------------------
| List of elements in category form
|------------------------------------------------------------------------------->

{!! Form::open(['route'=>['categories.post', 'id' => @$category->id],  'files'=>true, 'method' => 'post'])  !!}

<ul class="nav nav-tabs">
    <!--MENU 0-->
    <li class="active">
        <a data-toggle="tab" href="#menu_0">
            {!! trans('category-admin.menu_0') !!}
        </a>
    </li>

    <!--MENU 1-->
    <li>
        <a data-toggle="tab" href="#menu_1">
            {!! trans('category-admin.menu_1') !!}
        </a>
    </li>

    <!--MENU 2-->
    <li>
        <a data-toggle="tab" href="#menu_2">
            {!! trans('category-admin.menu_2') !!}
        </a>
    </li>
</ul>

<div class="tab-content">

    <!--CONTENT MENU 0-->
    <div id="menu_0" class="tab-pane fade in active">
        <!-- CATEGORY NAME -->
        @include('package-category::admin.partials.input_text', [
        'name' => 'category_name',
        'label' => trans('category-admin.category_name'),
        'value' => @$category->category_name,
        'description' => trans('category-admin.category-name-description'),
        'errors' => $errors,
        ])

        <!-- LIST OF CATEGORIES -->
        @include('package-category::admin.partials.select_single', [
        'name' => 'category_id_parent',
        'label' => trans('category-admin.category_parent'),
        'items' => $categories,
        'value' => @$category->category_id_parent,
        'description' => trans('category-admin.category-parent-description'),
        'errors' => $errors,
        ])
        <!-- /END LIST OF CATEGORIES -->
    </div>

    <!--CONTENT MENU 1-->
    <div id="menu_1" class="tab-pane fade">
        <h3>Menu 1</h3>
        <p>Some content in menu 1.</p>
    </div>

    <!--CONTENT MENU 2-->
    <div id="menu_2" class="tab-pane fade">
        <h3>Menu 2</h3>
        <p>Some content in menu 2.</p>
    </div>

</div>

<div class='hidden-field'>
    {!! Form::hidden('id',@$category->id) !!}
    {!! Form::hidden('context',$request->get('context',null)) !!}
</div>

<div class='btn-form'>
    <!-- DELETE BUTTON -->
    <a href="{!! URL::route('categories.delete',['id' => @$category->id, '_token' => csrf_token()]) !!}"
    class="btn btn-danger pull-right margin-left-5 delete">
    {!! trans('category-admin.btn_delete') !!}
    </a>
    <!-- DELETE BUTTON -->

    <!-- SAVE BUTTON -->
    {!! Form::submit(trans('category-admin.btn_save'), array("class"=>"btn btn-info pull-right ")) !!}
    <!-- /SAVE BUTTON -->
</div>
{!! Form::close() !!}
<!------------------------------------------------------------------------------
| End list of elements in category form
|------------------------------------------------------------------------------>