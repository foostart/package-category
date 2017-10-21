@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
    Admin area: {{ trans('sample::sample_admin.page_category') }}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><i class="fa fa-group"></i> {!! 'Sample' !!}</h3>
                </div>
                <div class="panel-body">
                    Admin Sample
               </div>
           </div>
        </div>
        <div class="col-md-4">
            @include('sample::sample_category.admin.sample_category_search')
        </div>
    </div>
</div>
@stop