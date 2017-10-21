
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('sample::sample_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_sample','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('sample_name', trans('sample::sample_admin.sample_name_label')) !!}
            {!! Form::text('sample_name', @$params['sample_name'], ['class' => 'form-control', 'placeholder' => trans('sample::sample_admin.sample_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('sample::sample_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>


