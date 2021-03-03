@if(!empty($items) && (!$items->isEmpty()) )
<?php
    $withs = [
        'counter' => '5%',
        'order' => '5%',
        'id' => '5%',
        'category_name' => '30%',
        'status' => '10%',
        'updated_at' => '15%',
        'operations' => '10%',
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
<div class="table-responsive">
<table class="table table-hover">

    <thead>
        <tr style="height: 50px;">

            <!--COUNTER-->
            <th style='width:{{ $withs['counter'] }}'>
                {{ trans($plang_admin.'.columns.#') }}
                <span class="del-checkbox pull-right">
                    <input type="checkbox" id="selecctall" />
                    <label for="del-checkbox"></label>
                </span>
            </th>

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

            <!--STATUS-->
            <?php $name = 'status' ?>

            <th class="hidden-xs text-center" style='width:{{ $withs[$name] }}'>{!! trans($plang_admin.'.columns.context-status') !!}
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

                 {!! Form::submit(trans($plang_admin.'.buttons.delete-in-trash'), array(
                                                                            "class"=>"btn btn-danger pull-right delete btn-delete-all del-trash",
                                                                            "title"=> trans($plang_admin.'.hint.delete-in-trash'),
                                                                            'name'=>'del-trash'))
                !!}
                {!! Form::submit(trans($plang_admin.'.buttons.delete-forever'), array(
                                                                            "class"=>"btn btn-warning pull-right delete btn-delete-all del-forever",
                                                                            "title"=> trans($plang_admin.'.hint.delete-forever'),
                                                                            'name'=>'del-forever'))
                !!}
            </th>

        </tr>

    </thead>

    <tbody>
        @foreach($items as $item)

            <tr>
                <!--COUNTER-->
                <td>
                    <?php echo $counter; $counter++ ?>
                    <span class='box-item pull-right'>
                        <input type="checkbox" id="<?php echo $item->id ?>" name="ids[]" value="{!! $item->id !!}">
                        <label for="box-item"></label>
                    </span>
                </td>

                <!--ORDER-->
                <td> {!! $item->category_order !!} </td>

                <!--ID-->
                <td> {!! $item->category_id !!} </td>

                <!--NAME-->
                <td> {!! $item->category_name !!} </td>

                <!--STATUS-->
                <td style="text-align: center;">

                    @if($item->status && (isset($config_status['list'][$item->status])))
                        <i class="fa fa-circle" style="color:{!! $config_status['color'][$item->status] !!}" title='{!! $config_status["list"][$item->status] !!}'></i>
                    @else
                    <i class="fa fa-circle-o red" title='{!! trans($plang_admin.".labels.unknown") !!}'></i>
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
    {!! HTML::script('packages/foostart/js/form-table.js')  !!}
@stop