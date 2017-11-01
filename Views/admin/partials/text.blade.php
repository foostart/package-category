<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $category_name = $request->get('category_titlename') ? $request->get('category_name') : @$category->category_name ?>
    {!! Form::label($name, trans('category-admin.name').':') !!}
    {!! Form::text($name, $category_name, ['class' => 'form-control', 'placeholder' => trans('category-admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->