<?php

if (!function_exists('displayChilds')){
function displayChilds($childs, $level){ ?>
        <?php global $counter; global $request; ?>
    <?php foreach ($childs as $item): ?>
        <tr>
                <!--#-->
                <td>
                    <?php echo $counter; $counter++ ?>
                    <span class='box-item pull-right'>
                        <input type="checkbox" id="<?php echo $item->id ?>" name="ids[]" value="{!! $item->id !!}">
                        <label for="box-item"></label>
                    </span>
                </td>

                <!--ORDER-->
                <td>{!! $item->category_order !!}</td>

                 <!--ID-->
                <td>{!! $item->category_id !!}</td>

                <!--NAME-->
                <td><span style="padding-left: <?php echo 30*$level ?>px"></span>
                    |_
                    {!! $item->category_name !!}
                </td>

                <!--URL-->
                <td>{!! $item->category_url !!}</td>

                <!--STATUS-->
                <td style="text-align: center;">

                    @if($item->category_status && (isset($config_status['list'][$item->category_status])))
                        <i class="fa fa-circle" style="color:{!! $config_status['color'][$item->category_status] !!}" title='{!! $config_status["list"][$item->category_status] !!}'></i>
                    @else
                        <i class="fa fa-circle-o red"></i>
                    @endif
                </td>

                <!--UPDATED AT-->
                <td> {!! date('Y-m-d', strtotime($item->updated_at) ) !!} </td>

                <!--OPERATOR-->
                <td>
                    <!--edit-->
                    <a href="{!! URL::route('categories.edit', ['id' => $item->id,
                                                                '_key' => $request->get('_key'),
                                                                '_token' => csrf_token()
                                                               ])
                            !!}">
                        <i class="fa fa-edit f-tb-icon"></i>
                    </a>

                    <!--copy-->
                    <a href="{!! URL::route('categories.copy',['cid' => $item->id,
                                                            '_key' => $request->get('_key'),
                                                            '_token' => csrf_token(),
                                                            ])
                             !!}"
                        class="margin-left-5">
                        <i class="fa fa-files-o f-tb-icon" aria-hidden="true"></i>
                    </a>

                    <!--delete-->
                    <a href="{!! URL::route('categories.delete',['id' => $item->id,
                                                                '_key' => $request->get('_key'),
                                                                '_token' => csrf_token(),
                                                                 ])
                             !!}"
                       class="margin-left-5 delete">
                        <i class="fa fa-trash-o f-tb-icon"></i>
                    </a>

                </td>

            </tr>

        <?php if ($item->childs): ?>
            <?php displayChilds($item->childs, $level + 1 ) ?>
        <?php endif; ?>

    <?php endforeach; ?>

<?php }}?>

<?php displayChilds($childs, 1); ?>