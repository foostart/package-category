<!-- CATEGORY LIST -->
<div class="form-group">
    <?php $sample_name = $request->get('sample_titlename') ? $request->get('sample_name') : @$sample->sample_name ?>

    {!! Form::label('category_id', trans('sample::sample_admin.sample_categoty_name').':') !!}
    {!! Form::select('category_id', @$categories, @$sample->category_id, ['class' => 'form-control']) !!}
</div>
<!-- /CATEGORY LIST -->