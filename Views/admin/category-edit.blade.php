<!--
| @TITLE
| Update existing category
| Add new category
|
|-------------------------------------------------------------------------------
| @REQUIRED
| Permission
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @DESCRIPTION
| 1. Admin (category-update-all) update all categories
| 2. Manager (category-update-team) update all categories in team
| 3. User (category-update-self) update his categories
|
|_______________________________________________________________________________
-->
@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
    {{ trans('category-admin.page-edit') }}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">

                <!--TITLE BAR-->
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($category->id)
                            ?
                            '<i class="fa fa-pencil"></i>'.trans('category-admin.form_edit')
                            :
                            '<i class="fa fa-users"></i>'.trans('category-admin.form_add')
                        !!}
                    </h3>
                </div>

                <!--DESCRIPTION-->
                <div class='panel-description'>
                    {!! trans('category-admin.page-description') !!}</h4>
                </div>

                <!-- ERRORS NAME  -->
                @if($errors->count() > 0)
                    <div class='panel-errors'>
                        @include('package-category::admin.partials.errors', ['errors' => $errors])
                    </div>
                @endif
                <!-- /END ERROR NAME -->


                {{-- successful message --}}
                @if(Session::get('message'))
                    <div class='panel-success'>
                        @include('package-category::admin.partials.success', ['message' => Session::get('message')])
                    </div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">

                            @include('package-category::admin.category-form')

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-md-4'>
            @include('package-category::admin.category-search')
        </div>

    </div>
</div>
@stop