<!-- SAMPLE NAME -->
<div class="form-group">
    @php
        $category_name = $request->get('category_titlename') ? $request->get('category_name') : ($category->category_name ?? '');
    @endphp

    @include('package-category::admin.partials.input_text', [
        'label'       => trans('category-admin.name') . ':',
        'name'        => $name,
        'value'       => $category_name,
        'class'       => 'form-control',
        'placeholder' => trans('category-admin.name')
    ])

</div>
<!-- /SAMPLE NAME -->
