<!-- SAMPLE NAME -->
<div class="form-group">
    @php
        $category_name = $request->get('category_titlename') ? $request->get('category_name') : ($category->category_name ?? '');
    @endphp

    {!! html()->label(trans('category-admin.name') . ':')->for($name) !!}
    {!! html()->text($name)
        ->value($category_name)
        ->class('form-control')
        ->placeholder(trans('category-admin.name')) !!}
</div>
<!-- /SAMPLE NAME -->