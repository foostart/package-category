<!------------------------------------------------------------------------------
| List of elements in sample form
|------------------------------------------------------------------------------->

{!! Form::open(['route'=>['contexts.post', 'id' => @$item->id],  'files'=>true, 'method' => 'post'])  !!}

    <!--BUTTONS-->
    <div class='btn-form'>
        <!-- DELETE BUTTON -->
        @if($item)
            <a href="{!! URL::route('contexts.delete',['id' => @$item->id, '_token' => csrf_token()]) !!}"
            class="btn btn-danger pull-right margin-left-5 delete">
                {!! trans($plang_admin.'.buttons.delete') !!}
            </a>
        @endif
        <!-- DELETE BUTTON -->

        <!-- SAVE BUTTON -->
        {!! Form::submit(trans($plang_admin.'.buttons.save'), array("class"=>"btn btn-info pull-right ")) !!}
        <!-- /SAVE BUTTON -->
    </div>
    <!--/BUTTONS-->

    <!--TAB MENU-->
    <ul class="nav nav-tabs">
        <!--MENU 1-->
        <li class="active">
            <a data-toggle="tab" href="#menu_1">
                {!! trans($plang_admin.'.tabs.menu_1') !!}
            </a>
        </li>

        <!--MENU 2-->
        <li>
            <a data-toggle="tab" href="#menu_2">
                {!! trans($plang_admin.'.tabs.menu_2') !!}
            </a>
        </li>

        <!--MENU 3-->
        <li>
            <a data-toggle="tab" href="#menu_3">
                {!! trans($plang_admin.'.tabs.menu_3') !!}
            </a>
        </li>
    </ul>
    <!--/TAB MENU-->

    <!--TAB CONTENT-->
    <div class="tab-content">

        <!--MENU 1-->
        <div id="menu_1" class="tab-pane fade in active">

            <!--NAME-->
            @include('package-category::admin.partials.input_text', [
            'name' => 'context_name',
            'label' => trans($plang_admin.'.labels.context_name'),
            'value' => @$item->context_name,
            'description' => trans($plang_admin.'.description.context_name'),
            'errors' => $errors,
            ])
            <!--/NAME-->

            <!--NAME-->
            @include('package-category::admin.partials.input_text', [
            'name' => 'context_ref',
            'label' => trans($plang_admin.'.labels.context_ref'),
            'value' => @$item->context_ref,
            'description' => trans($plang_admin.'.description.context_ref'),
            'errors' => $errors,
            ])
            <!--/NAME-->

            <!--KEY-->
            @include('package-category::admin.partials.label', [
            'name' => 'context_key',
            'label' => trans($plang_admin.'.labels.context_key'),
            'value' => @$item->context_key,
            'description' => trans($plang_admin.'.description.context_key'),
            'errors' => $errors,
            ])

            <!--CHECKBOX-->
            @if($request->get('id'))
            @include('package-category::admin.partials.checkbox', [
            'name' => 'context_key',
            'items' => ['Set new key']
            ])
            @endif
            
            <!--STATUS-->
            @include('package-category::admin.partials.radio', [
            'name' => 'context_status',
            'label' => trans($plang_admin.'.labels.context_status'),
            'value' => @$item->context_status,
            'description' => trans($plang_admin.'.description.context_status'),
            'items' => $statuses
            ])

        </div>

        <!--MENU 2-->
        <div id="menu_2" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Some content in menu 1.</p>
        </div>

        <!--MENU 3-->
        <div id="menu_3" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Some content in menu 2.</p>
        </div>

    </div>
    <!--/TAB CONTENT-->

    <!--HIDDEN FIELDS-->
    <div class='hidden-field'>
        {!! Form::hidden('id',@$item->id) !!}
        {!! Form::hidden('context',$request->get('context',null)) !!}
    </div>
    <!--/HIDDEN FIELDS-->

{!! Form::close() !!}
<!------------------------------------------------------------------------------
| End list of elements in sample form
|------------------------------------------------------------------------------>