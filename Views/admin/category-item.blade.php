@if(!empty($items) && (!$items->isEmpty()) )
<?php
    $withs = [
        'order' => '5%',
        'id' => '5%',
        'category_name' => '30%',
        'user_full_name' => '25%',
        'status' => '5%',
        'updated_at' => '15%',
        'operations' => '10%',
        'delete' => '5%',
    ];

    global $counter;
    $nav = $items->toArray();
    $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
?>
<caption>
    @if($nav['total'] == 1)
        {!! trans($plang_admin.'.descriptions.counter', ['number' => $nav['total']]) !!}
    @else
        {!! trans($plang_admin.'.descriptions.counters', ['number' => $nav['total']]) !!}
    @endif
</caption>

<table class="table table-hover">

    <thead>
        <tr style="height: 50px;">

            <!--ORDER-->
            <th style='width:{{ $withs['order'] }}'>
                {{ trans($plang_admin.'.columns.order') }}
            </th>

            <!--ID-->
            <th style='width:{{ $withs['id'] }}'>
                {{ trans($plang_admin.'.columns.id') }}
            </th>

            <!--CATEGORY NAME-->
            <?php $name = 'category_name' ?>

            <th class="hidden-xs" style='width:{{ $withs[$name] }}'>{!! trans($plang_admin.'.columns.category-name') !!}
                <a href='{!! $sorting["url"][$name] !!}' class='tb-id' data-order='asc'>
                    @if($sorting['items'][$name] == 'asc')
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    @elseif($sorting['items'][$name] == 'desc')
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    @endif
                </a>
            </th>


            <!--USER FULL NAME-->
            <?php $name = 'user_full_name' ?>

            <th class="hidden-xs" style='width:{{ $withs[$name] }}'>{!! trans($plang_admin.'.columns.user-full-name') !!}
                <a href='{!! $sorting["url"][$name] !!}' class='tb-id' data-order='asc'>
                    @if($sorting['items'][$name] == 'asc')
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    @elseif($sorting['items'][$name] == 'desc')
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    @endif
                </a>
            </th>


            <!--STATUS-->
            <th style='width:{{ $withs['status'] }}'>
                {{ trans($plang_admin.'.columns.status') }}
            </th>

            <!-- UPDATED AT -->
            <?php $name = 'updated_at' ?>

            <th class="hidden-xs" style='width:{{ $withs[$name] }}'>{!! trans($plang_admin.'.columns.updated_at') !!}
                <a href='{!! $sorting["url"][$name] !!}' class='tb-id' data-order='asc'>
                    @if($sorting['items'][$name] == 'asc')
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                    @elseif($sorting['items'][$name] == 'desc')
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    @endif
                </a>
            </th>

            <!--OPERATIONS-->
            <th style='width:{{ $withs['operations'] }}'>
                <span class='lb-delete-all'>
                    {{ trans($plang_admin.'.columns.operations') }}
                </span>

                {!! Form::submit(trans($plang_admin.'.buttons.delete'), array("class"=>"btn btn-danger pull-right delete btn-delete-all del-trash", 'name'=>'del-trash')) !!}
                {!! Form::submit(trans($plang_admin.'.buttons.delete'), array("class"=>"btn btn-warning pull-right delete btn-delete-all del-forever", 'name'=>'del-forever')) !!}
            </th>

            <!--DELETE-->
            <th style='width:{{ $withs['delete'] }}'>
                <span class="del-checkbox pull-right">
                    <input type="checkbox" id="selecctall" />
                    <label for="del-checkbox"></label>
                </span>
            </th>

        </tr>

    </thead>

    <tbody>
        @foreach($items as $item)

            <tr>
                <!--ORDER-->
                <td> <?php echo $counter; $counter++ ?> </td>

                <!--ID-->
                <td> {!! $item->category_id !!} </td>

                <!--NAME-->
                <td> {!! $item->category_name !!} </td>

                <!--USER_FULL_NAME-->
                <td> {!! $item->user_full_name !!} </td>

                <!--STATUS-->
                <td style="text-align: center;">

                    <?php $status = config('package-category.status'); ?>
                    @if($item->category_status && (isset($status['list'][$item->category_status])))
                        <i class="fa fa-circle" style="color:{!! $status['color'][$item->category_status] !!}" title='{!! $status["list"][$item->category_status] !!}'></i>
                    @else
                        <i class="fa fa-circle-o red"></i>
                    @endif
                </td>

                <!--UPDATED AT-->
                <td> {!! date('Y-m-d', strtotime($item->updated_at) ) !!} </td>

                <!--OPERATOR-->
                <td>
                    <!--edit-->
                    <a href="{!! URL::route('categories.edit', ['id' => $item->id,
                                                               '_key' => $request->get('_key'),
                                                                '_token' => csrf_token()
                                                               ])
                            !!}">
                        <i class="fa fa-edit f-tb-icon"></i>
                    </a>

                    <!--copy-->
                    <a href="{!! URL::route('categories.copy',['cid' => $item->id,
                                                            '_key' => $request->get('_key'),
                                                            '_token' => csrf_token(),
                                                            ])
                             !!}"
                        class="margin-left-5">
                        <i class="fa fa-files-o f-tb-icon" aria-hidden="true"></i>
                    </a>

                    <!--delete-->
                    <a href="{!! URL::route('categories.delete',['id' => $item->id,
                                                                '_key' => $request->get('_key'),
                                                                '_token' => csrf_token(),
                                                                 ])
                             !!}"
                       class="margin-left-5 delete">
                        <i class="fa fa-trash-o f-tb-icon"></i>
                    </a>

                </td>

                <!--DELETE-->
                <td>
                    <span class='box-item pull-right'>
                        <input type="checkbox" id="<?php echo $item->id ?>" name="ids[]" value="{!! $item->id !!}">
                        <label for="box-item"></label>
                    </span>
                </td>

            </tr>
            @if($item->childs)

                @include('package-category::admin.partials.td-record', ['childs' => $item->childs, 'counter' => &$counter])

            @endif
        @endforeach

    </tbody>

</table>
<div class="paginator">
    {!! $items->appends($request->except(['page']) )->render() !!}
</div>
@else
    <!--SEARCH RESULT MESSAGE-->
    <span class="text-warning">
        <h5>
            {{ trans($plang_admin.'.descriptions.not-found') }}
        </h5>
    </span>
    <!--/SEARCH RESULT MESSAGE-->
@endif

@section('footer_scripts')
    @parent
    {!! HTML::script('packages/foostart/package-sample/js/form-table.js')  !!}
@stop