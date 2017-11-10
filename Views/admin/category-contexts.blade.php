@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
    {{ trans('category-admin.category_contexts') }}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        <i class="fa fa-group"></i>
                        {!! trans('category-admin.category_contexts') !!}
                    </h3>
                </div>
                <!--MESSAGE-->
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                    <div class="alert alert-success flash-message">{!! $message !!}</div>
                @endif
                <!--/END MESSAGE-->

                <!--ERRORS-->
                @if($errors && ! $errors->isEmpty() )
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger flash-message">{!! $error !!}</div>
                    @endforeach
                @endif

                <!--/END ERRORS-->
                <div class="panel-body">
                    @include('package-category::admin.category-context')
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
@stop