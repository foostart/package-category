<?php

if (!function_exists('displayChilds')){
function displayChilds($childs, $level){ ?>
        <?php global $counter; ?>
    <?php foreach ($childs as $item): ?>
        <tr>
                <!--COUNTER-->
                <td> <?php echo $counter; $counter++ ?> </td>

                <!--CATEGORY ID-->
                <td>
                    {!! $item->id !!}
                </td>

                <!--CATEGORY NAME-->
                <td><span style="padding-left: <?php echo 30*$level ?>px"></span>
                    |_
                    {!! $item->category_name !!}
                </td>

                <!--OPERATOR-->
                <td>
                    <a href="{!! URL::route('categories.edit', ['id' => $item->id]) !!}">
                        <i class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="{!! URL::route('categories.delete',['id' =>  $item->id, '_token' => csrf_token()]) !!}"
                       class="margin-left-5 delete">
                        <i class="fa fa-trash-o fa-2x"></i>
                    </a>
                    <span class="clearfix"></span>
                </td>
                <!--/END OPERATOR-->
        </tr>

        <?php if ($item->childs): ?>
            <?php displayChilds($item->childs, $level + 1 ) ?>
        <?php endif; ?>

    <?php endforeach; ?>

<?php }}?>

<?php displayChilds($childs, 1); ?>