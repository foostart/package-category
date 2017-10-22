
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('category::lang_package_category.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_category_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('category_category_name',trans('category::lang_package_category.category_category_name_label')) !!}
            {!! Form::text('category_category_name', @$params['category_category_name'], ['class' => 'form-control', 'placeholder' => trans('category::lang_package_category.category_category_name')]) !!}
        </div>

        {!! Form::submit(trans('category::lang_package_category.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




