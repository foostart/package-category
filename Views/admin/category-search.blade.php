
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('category-admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'categories.list','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('category_name',trans('category-admin.category_name_label')) !!}
            {!! Form::text('category_name', @$params['category_name'], ['class' => 'form-control', 'placeholder' => trans('category-admin.category_name')]) !!}
        </div>

        {!! Form::submit(trans('category-admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




