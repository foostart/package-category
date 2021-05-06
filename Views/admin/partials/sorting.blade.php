<!--
| @TITLE
| Sorting data on the list of items
|
|-------------------------------------------------------------------------------
| @REQUIRED
| 1. The list of messages: admin_message_script.blade.php
| 2. The script: custom-ordering.js
|
|÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
| @DESCRIPTION
| 1. Show select sorting
| 2. Show select order by
| 3. Show button add sorting
| 4. Show message error
|
|_______________________________________________________________________________
-->
<div class="row form-group">
    <div class="col-md-12">
        {!!Form::label(trans('category-admin.labels.sorting')) !!}
    </div>

    <!-- SORTING BY -->
    <div class="col-md-12 margin-top-10">
        {!!Form::select('', $sorting['label'], $request->get('order_by',''), ['class' => 'form-control form-validable', 'id' => 'order-by-select']) !!}
        <span class="text-danger hidden form-error-required-order">
            {!! trans('category-admin.errors.required-order-by') !!}
        </span>
        <span class="text-danger hidden form-error-existing-order">
            {!! trans('category-admin.errors.existing-order') !!}
        </span>
    </div>

    <!-- ORDER BY -->
    <div class="col-md-12 margin-top-10">
        {!!Form::select('', $order_by, $request->get('ordering','asc'), ['class' =>'form-control', 'id' => 'ordering-select']) !!}
    </div>

    <!-- BUTTON -->
    <div class="col-md-12 margin-top-10">
        <a class="btn btn-default pull-right" id="add-ordering-filter">
            <i class="fa fa-plus"></i>
            {!! trans('category-admin.buttons.add') !!}
        </a>
    </div>
    <!-- SORTED BY -->
    <span id="append-sorting" style="display: inline-block;padding: 15px;"></span>
    {!!Form::hidden('order_by',$request->get('order_by'),["id" => "order-by" ]) !!}
    {!!Form::hidden('ordering',$request->get('ordering'), ["id" => "ordering"]) !!}
</div>

@section('footer_scripts')
    @parent
    {!! HTML::script('packages/foostart/js/custom-ordering.js')  !!}
@stop
