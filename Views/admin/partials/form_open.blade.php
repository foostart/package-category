<!------------------------------------------------------------------------------
| TITLE
| Form
|
| ATTRIBUTES
| id
| name
| method
| action
| class
| file
|
|-------------------------------------------------------------------------------
| REQUIRED
| method
| action
|
|
|
|-------------------------------------------------------------------------------
| SYNTAX
|
------------------------------------------------------------------------------->

<!--DATA-->
<?php
//Name
$name = empty($name) ? '' : $name;

//Id
$id = empty($id) ? $name : $id;

//Method
$method = empty($method) ? '' : $method;

//Action
$action = empty($action) ? '#' : $action;

//Class
$defaultClass = '';
$class = empty($class) ? '' : $class;
$class = $defaultClass . ' ' . $class;

//Enctype
$enctype = empty($file) ? '' : 'multipart/form-data';

?>
<!--/DATA-->

<!--FORM OPEN-->
<form   action="{{ $action }}"
        method="{{ $method }}"
        class="{{ $class }}"

        @if($id)
            id = "{{ $id }}"
        @endif

        @if($name)
            name = "{{ $name }}"
        @endif

        @if($enctype)
            enctype="{{ $enctype }}"
        @endif
>
@csrf
