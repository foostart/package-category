
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('category-admin.page-search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'categories.list','method' => 'get']) !!}

            <!--BUTTONS-->
            <div class="form-group">
                <a href="{!! URL::route('categories.list') !!}" class="btn btn-default search-reset">{!! trans('tailieuweb.btn-reset') !!}</a>
                {!! Form::submit(trans('category-admin.search').'', ["class" => "btn btn-info pull-right", 'id' => 'search-submit']) !!}
            </div>

            <!-- KEYWORD -->
            @include('package-category::admin.partials.input_text', [
                'name' => 'keyword',
                'label' => trans('tailieuweb.keyword'),
                'value' => @$params['keyword'],
            ])


            @include('package-category::admin.partials.sorting')

        {!! Form::close() !!}
    </div>
</div>