
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('category-admin.category_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'categories.list','method' => 'get']) !!}

            <!--BUTTONS-->
            <div class="form-group">
                <a href="{!! URL::route('categories.list') !!}" class="btn btn-default search-reset">{!! trans('category-admin.btn_reset') !!}</a>
                {!! Form::submit(trans('category-admin.btn_search').'', ["class" => "btn btn-info", 'id' => 'search-submit']) !!}
            </div>

            <!-- KEYWORD -->
            @include('package-category::admin.partials.input_text', [
                'name' => 'keyword',
                'label' => trans('category-admin.keyword'),
                'value' => @$params['keyword'],
            ])


            @include('package-category::admin.partials.sorting')

            <div class='hidden-field'>
                {!! Form::hidden('context',@$request->get('context',null)) !!}
            </div>

        {!! Form::close() !!}
    </div>
</div>