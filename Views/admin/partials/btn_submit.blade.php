<!------------------------------------------------------------------------------
| TITLE
| Button submit
|
|-------------------------------------------------------------------------------
| REQUIRED
| label
|
|-------------------------------------------------------------------------------
| SYNTAX
|
------------------------------------------------------------------------------->

<!--DATA-->
<?php
//Label
$label = empty($label) ? '' : $label;

//Name
$name = empty($name) ? 'btn-submit' : $name;

//Id
$id = empty($id) ? $name : $id;

//Class
$class = empty($class) ? '' : $class;
$defaultClass = '';
$class = $defaultClass . ' ' . $class;

//Title
$title = empty($title) ? '' : $title;
?>
<!--/DATA-->

<!-- BUTTON SUBMIT -->
<input type="submit"
       value="{!! $label !!}"
        class="{!! $class !!}"
        name="{!! $name !!}"
        id="{!! $id !!}"
        title="{!! $title !!}"

>
<!-- /BUTTON SUBMIT -->
