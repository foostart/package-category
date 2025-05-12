<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i>
            <?php echo trans($plang_admin.'.labels.title-search') ?>
        </h3>
    </div>
    <div class="panel-body">

        <!-- FORM OPEN -->
        @include('package-category::admin.partials.form_open', [
            'method' => 'GET',
            'action' => route('categories.list', ['_key' => @$params['_key']])
        ])


        <!--BUTTONS-->
            <div class="form-group">
                <a href="{!! URL::route('categories.list', ['_key' => @$params['_key']]) !!}" class="btn btn-default search-reset">
                    {!! trans($plang_admin.'.buttons.reset') !!}
                </a>
                @include('package-category::admin.partials.btn_submit', [
                    'label' => trans($plang_admin.'.buttons.search'),
                    'class' => 'btn btn-info',
                    'id' => 'search-submit'
                ])

            </div>

            <!-- KEYWORD -->
            @include('package-category::admin.partials.input_text', [
                'name' => 'keyword',
                'label' => trans($plang_admin.'.form.keyword'),
                'value' => @$params['keyword'],
            ])

            <!-- STATUS -->
            @include('package-category::admin.partials.select_single', [
                'name' => 'status',
                'label' => trans($plang_admin.'.form.status'),
                'value' => @$params['status'],
                'items' => $status,
            ])

            <!--SORTING-->
            @include('package-category::admin.partials.sorting')

            <div class='hidden-field'>
                @include('package-category::admin.partials.input_text', [
                    'hidden' => true,
                    'name'   => '_key',
                    'id'     => '_key',
                    'value'  => @$params['_key']
                ])

                {!! csrf_field() !!}
            </div>

        <!-- FORM CLOSE -->
        @include('package-category::admin.partials.form_close')
    </div>
</div>
