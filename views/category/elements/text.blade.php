<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $category_category_name = $request->get('category_titlename') ? $request->get('category_name') : @$category->category_category_name ?>
    {!! Form::label($name, trans('category::lang_package_category.name').':') !!}
    {!! Form::text($name, $category_category_name, ['class' => 'form-control', 'placeholder' => trans('category::lang_package_category.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->