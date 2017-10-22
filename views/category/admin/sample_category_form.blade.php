@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
    Admin area: {{ trans('category::lang_package_category.page_category') }}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><i class="fa fa-group"></i> {!! 'Category' !!}</h3>
                </div>
                <div class="panel-body">
                    Admin Category
               </div>
           </div>
        </div>
        <div class="col-md-4">
            @include('category::category_category.admin.category_category_search')
        </div>
    </div>
</div>
@stop