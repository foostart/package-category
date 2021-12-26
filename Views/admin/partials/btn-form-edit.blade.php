<!--
| @TITLE
| Input text element in form
|
|-------------------------------------------------------------------------------
| @REQUIRED
| $item is data record
| $routeRestore is route restore
| $routeDelete is route delete
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @SYNTAX
|
------------------------------------------------------------------------------->

<!--DATA-->
<?php
//Route restore
$routeRestore = empty($routeRestore) ? '/' : $routeRestore;
//Route delete
$routeDelete = empty($routeDelete) ? '/' : $routeDelete;
?>
<!--/DATA-->

<!-- BUTTON FORM EDIT -->
<div class='btn-form'>
    <!-- RESTORE/DELETE BUTTON -->
    @if(isset($item) && $item->deleted_at)
        <a href="{!! URL::route($routeRestore,['id' => $item->id, '_token' => csrf_token()]) !!}"
           class="btn btn-success pull-right margin-left-5 restore">
            {!! trans($plang_admin.'.buttons.restore') !!}
        </a>
    @elseif (isset($item))
        <a href="{!! URL::route($routeDelete,['id' => @$item->id, '_token' => csrf_token()]) !!}"
           class="btn btn-warning pull-right margin-left-5 delete">
            {!! trans($plang_admin.'.buttons.delete') !!}
        </a>
    @endif
    <!-- RESTORE/DELETE BUTTON -->

    <!-- SAVE BUTTON -->
    {!! Form::submit(trans($plang_admin.'.buttons.save'), array("class"=>"btn btn-info pull-right ")) !!}
    <!-- /SAVE BUTTON -->
</div>
<!-- /BUTTON FORM EDIT -->
