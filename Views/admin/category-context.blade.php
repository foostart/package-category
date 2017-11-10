@if($contexts)
<table class="table table-hover">
    <!--Head-->
    <thead>
        <tr>
            <th style='width:5%'>
                {{ trans('category-admin.order') }}
            </th>

            <!-- context name -->
            <?php $name = 'context_name' ?>
            <th class="hidden-xs" style='width:40%'>
                {!! trans('category-admin.'.$name) !!}
            </th>

            <!-- context key -->
            <?php $name = 'context_key' ?>
            <th class="hidden-xs" style='width:40%'>
                {!! trans('category-admin.'.$name) !!}
            </th>

            <th style='width:15%'>
                {{ trans('category-admin.operations') }}
            </th>
        </tr>
    </thead>
    <!--Body--->
    <tbody>
        <?php $counter = 1 ?>
        @foreach($contexts as $name =>  $key)
            <tr>
                <!--COUNTER-->
                <td> <?php echo $counter; $counter++ ?> </td>

                <!--CATEGORY NAME-->
                <td> {!! $name !!} </td>

                <!--CATEGORY KEY-->
                <td> {!! $key !!} </td>

                <!--OPERATOR-->
                <td>
                    <a href="{!! URL::route('categories.list', ['context'=> $key]) !!}">
                        <i class="fa fa-link" aria-hidden="true"></i>
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
            {!! trans('category-admin.message-find-failed') !!}
        </h5>
    </span>
    <!-- /END FIND MESSAGE -->
@endif