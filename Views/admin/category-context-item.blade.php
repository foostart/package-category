<?php

?>
<!--ADD SAMPLE CATEGORY ITEM-->
<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('categories.edit', ['context' => $request->get('context')]) !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i>{{trans('category-admin.category_add')}}
        </a>
    </div>
</div>
<!--/END ADD SAMPLE CATEGORY ITEM-->

@if( ! $items->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th style='width:5%'>
                {{ trans('category-admin.order') }}
            </th>

            <!-- category name -->
            <?php $name = 'category_name' ?>
            <th class="hidden-xs" style='width:65%'>{!! trans('category-admin.'.$name) !!}
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

            <th style='width:10%'>
                {{ trans('category-admin.operations') }}
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            global $counter;
            $nav = $items->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($items as $category)
        <tr>
            <!--COUNTER-->
            <td> <?php echo $counter; $counter++ ?> </td>

            <!--CATEGORY NAME-->
            <td> {!! $category->category_name !!} </td>

            <!--OPERATOR-->
            <td>
                <a href="{!! URL::route('categories.edit', ['id' => $category->id,
                                                            '_token' => csrf_token(),
                                                            'context' => $request->get('context',null)
                                                           ])
                        !!}">
                    <i class="fa fa-edit fa-2x"></i>
                </a>
                <a href="{!! URL::route('categories.delete',['id' => $category->id,
                                                            '_token' => csrf_token(),
                                                            'context' => $request->get('context',null)
                                                             ])
                         !!}"
                   class="margin-left-5 delete">
                    <i class="fa fa-trash-o fa-2x"></i>
                </a>
                <span class="clearfix"></span>
            </td>
            <!--/END OPERATOR-->
        </tr>
        @if($category->childs)

            @include('package-category::admin.partials.td-record', ['childs' => $category->childs, 'counter' => &$counter])

        @endif

        @endforeach
    </tbody>
</table>
@else
    <!-- FIND MESSAGE -->
    <span class="text-warning">
        <h5>
            {{ trans('category-admin.message-find-failed') }}
        </h5>
    </span>
    <!-- /END FIND MESSAGE -->
@endif
<div class="paginator">
    {!! $items->appends($request->except(['page']) )->render() !!}
</div>