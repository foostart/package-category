<?php

if (!function_exists('displayChilds')){
function displayChilds($childs, $level){ ?>
        <?php global $counter; global $request; ?>
    <?php foreach ($childs as $item): ?>
        <tr>
                <!--ORDER-->
                <td> <?php echo $counter; $counter++ ?> </td>

                <!--NAME-->
                <td><span style="padding-left: <?php echo 30*$level ?>px"></span>
                    |_
                    {!! $item->category_name !!}
                </td>

                <!--USER_FULL_NAME-->
                <td> {!! $item->user_full_name !!} </td>

                <!--STATUS-->
                <td style="text-align: center;">

                    @if($item->category_status)
                        <i class="fa fa-circle green"></i>
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

                    <!--delete-->
                    <a href="{!! URL::route('categories.delete',['id' => $item->id,
                                                                '_key' => $request->get('_key'),
                                                                '_token' => csrf_token(),
                                                                 ])
                             !!}"
                       class="margin-left-5 delete">
                        <i class="fa fa-trash-o f-tb-icon"></i>
                    </a>

                    <!--copy-->
                    <a href="{!! URL::route('categories.edit',['id' => $item->id,
                                                            'cid' => $item->id,
                                                            '_token' => csrf_token(),
                                                            ])
                             !!}"
                        class="margin-left-5 delete">
                        <i class="fa fa-files-o f-tb-icon" aria-hidden="true"></i>
                    </a>

                </td>

                <!--DELETE-->
                <td>
                    <span class='box-item pull-right'>
                        <input type="checkbox" id="<?php echo $item->id ?>" name="ids[]" value="{!! $item->id !!}">
                        <label for="box-item"></label>
                    </span>
                </td>

            </tr>

        <?php if ($item->childs): ?>
            <?php displayChilds($item->childs, $level + 1 ) ?>
        <?php endif; ?>

    <?php endforeach; ?>

<?php }}?>

<?php displayChilds($childs, 1); ?>