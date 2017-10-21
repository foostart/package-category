<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $sample_category_name = $request->get('sample_titlename') ? $request->get('sample_name') : @$sample->sample_category_name ?>
    {!! Form::label($name, trans('sample::sample_admin.name').':') !!}
    {!! Form::text($name, $sample_category_name, ['class' => 'form-control', 'placeholder' => trans('sample::sample_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->