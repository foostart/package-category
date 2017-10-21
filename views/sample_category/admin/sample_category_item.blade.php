<!--ADD SAMPLE CATEGORY ITEM-->
<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('admin_sample_category.edit') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i>{{trans('sample::sample_admin.sample_category_add_button')}}
        </a>
    </div>
</div>
<!--/END ADD SAMPLE CATEGORY ITEM-->

@if( ! $samples_categories->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>
                {{ trans('sample::sample_admin.order') }}
            </td>

            <th style='width:10%'>
                {{ trans('sample::sample_admin.sample_categoty_id') }}
            </th>

            <th style='width:50%'>
                {{ trans('sample::sample_admin.sample_categoty_name') }}
            </th>

            <th style='width:20%'>
                {{ trans('sample::sample_admin.operations') }}
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $samples_categories->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($samples_categories as $sample_category)
        <tr>
            <!--COUNTER-->
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <!--/END COUNTER-->

            <!--SAMPLE CATEGORY ID-->
            <td>
                {!! $sample_category->sample_category_id !!}
            </td>
            <!--/END SAMPLE CATEGORY ID-->

            <!--SAMPLE CATEGORY NAME-->
            <td>
                {!! $sample_category->sample_category_name !!}
            </td>
            <!--/END SAMPLE CATEGORY NAME-->

            <!--OPERATOR-->
            <td>
                <a href="{!! URL::route('admin_sample_category.edit', ['id' => $sample_category->sample_category_id]) !!}">
                    <i class="fa fa-edit fa-2x"></i>
                </a>
                <a href="{!! URL::route('admin_sample_category.delete',['id' =>  $sample_category->sample_category_id, '_token' => csrf_token()]) !!}"
                   class="margin-left-5 delete">
                    <i class="fa fa-trash-o fa-2x"></i>
                </a>
                <span class="clearfix"></span>
            </td>
            <!--/END OPERATOR-->
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <!-- FIND MESSAGE -->
    <span class="text-warning">
        <h5>
            {{ trans('sample::sample_admin.message_find_failed') }}
        </h5>
    </span>
    <!-- /END FIND MESSAGE -->
@endif
<div class="paginator">
    {!! $samples_categories->appends($request->except(['page']) )->render() !!}
</div>