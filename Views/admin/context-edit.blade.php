<!--
| @TITLE
| Update existing context
| Add new context
|
|-------------------------------------------------------------------------------
| @REQUIRED
| Permission
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @DESCRIPTION
| 1. Admin
| 2. Manager
| 3. User
|
|_______________________________________________________________________________
-->
@extends('package-acl::admin.layouts.base-2cols')

@section('title')
    {{ trans($plang_admin.'.pages.title-edit-context') }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-8">
                <div class="panel panel-info">

                    <!--TITLE BAR-->
                    <div class="panel-heading">
                        <h3 class="panel-title bariol-thin">
                            {!! !empty($item->id)
                                ?
                                '<i class="fa fa-pencil"></i>'.trans($plang_admin.'.pages.title-edit-context')
                                :
                                '<i class="fa fa-users"></i>'.trans($plang_admin.'.pages.title-add-context')
                            !!}
                        </h3>
                    </div>

                    <!--DESCRIPTION-->
                    <div class='panel-description'>
                        {!! trans($plang_admin.'.descriptions.context-form') !!}</h4>
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

                                @include('package-category::admin.context-form')

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='col-md-4'>
                @include('package-category::admin.context-search')
            </div>

        </div>
    </div>
@stop
