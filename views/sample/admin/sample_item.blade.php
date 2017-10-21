
@if( ! $samples->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('sample::sample_admin.order') }}</td>
            <th style='width:10%'>Sample ID</th>
            <th style='width:50%'>Sample title</th>
            <th style='width:20%'>{{ trans('sample::sample_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $samples->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($samples as $sample)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $sample->sample_id !!}</td>
            <td>{!! $sample->sample_name !!}</td>
            <td>
                <a href="{!! URL::route('admin_sample.edit', ['id' => $sample->sample_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_sample.delete',['id' =>  $sample->sample_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('sample::sample_admin.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $samples->appends($request->except(['page']) )->render() !!}
</div>