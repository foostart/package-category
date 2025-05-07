<?php

return [

    /*
    |-----------------------------------------------------------------------
    | MAIN MENU
    |-----------------------------------------------------------------------
    | Top menu
    |
    */
    'menus' => [
        'top-menu' => 'Categories',
        'top-menu-contexts' => 'Contexts',
        'category' => 'Categories',
        'context' => 'Context',
    ],


    /*
    |-----------------------------------------------------------------------
    | SIDEBAR
    |-----------------------------------------------------------------------
    | Left side bar
    |
    |
    |
    */
    'sidebar' => [
        'list' => 'Items',
        'add' => 'Add new',
        'trash' => 'Trash',
        'config' => 'Configurations',
        'lang' => 'Languages',
    ],


    /*
    |-----------------------------------------------------------------------
    | Table column
    |-----------------------------------------------------------------------
    | The list of columns in table
    |
    */
    'columns' => [
        'any' => 'Any',
        'order' => 'Order',
        'counter' => '#',
        'id' => 'ID',
        'category-name' => 'Category name',
        'user-full-name' => 'User full name',
        'context-name' => 'Context name',
        'operations' => 'Operations',
        'updated_at' => 'Updated at',
        'filename' => 'File name',
        'context-ref' => 'Ref',
        'context-status' => 'Status',
        'key' => 'Key',
        'status' => 'Status',
        '#' => '#',
        'url' => 'Url',
    ],


    /*
    |-----------------------------------------------------------------------
    | Pages
    |-----------------------------------------------------------------------
    | Pages
    |
    */
    'pages' => [
        'title-list' => 'List of categories',
        'title-list-context' => 'List of contexts',
        'title-list-search' => 'Search results',
        'title-edit' => 'Edit category',
        'title-edit-context' => 'Edit context',
        'title-edit-category' => 'Edit category',
        'title-add' => 'Add new category',
        'title-add-context' => 'Add new context',
        'title-delete' => 'Delete category',
        'title-delete-context' => 'Delete context',
        'title-config' => 'Current configurations',
        'title-lang' => 'Manage languages',
    ],


    /*
    |-----------------------------------------------------------------------
    | Button
    |-----------------------------------------------------------------------
    | The list of buttons
    |
    */
    'buttons' => [
        'search' => 'Search',
        'reset' => 'Resest',
        'add' => 'Add',
        'save' => 'Save',
        'delete' => 'Delete',
        'remove' => 'Remove',
        'upload' => 'Upload',
        'delete-in-trash' => 'In trash',
        'delete-forever' => 'Forever',
        'undo' => 'Undo',

    ],


    /*
    |-----------------------------------------------------------------------
    | Hint
    |-----------------------------------------------------------------------
    | The list of hint
    |
    */
    'hint' => [
        'delete-forever' => 'Delete forever',
        'delete-in-trash' => 'Delete in trash',
    ],


    /*
    |-----------------------------------------------------------------------
    | Form
    |-----------------------------------------------------------------------
    | The list of elements in form
    |
    |
    */
    'form' => [
        'keyword' => 'Keyword',
        'sorting' => 'Sorting',
        'no-selected' => 'No selected',
        'status' => 'Status',
    ],


    /*
    |-----------------------------------------------------------------------
    | Description
    |-----------------------------------------------------------------------
    | Description
    |
    */
    'descriptions' => [
        'category-form' => 'Category form',
        'overview' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'context-form' => 'Context form',
        'update' => 'Update category',
        'category-name' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'category' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'list' => 'List of items',
        'counters' => 'There are <b>:number</b> items',
        'counter' => 'There is <b>:number</b> item',
        'not-found' => 'Not found items',
        'config' => 'List of configurations',
        'lang' => 'List of languages',
        'category-slug' => 'Category Slug',
        'context-name' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'context-ref' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'context-key' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'context-status' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'status' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'category-url' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'category-order' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'category-parent' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'category-image' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'category-icon' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'category-status' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
    ],


    /*
    |-----------------------------------------------------------------------
    | Error
    |-----------------------------------------------------------------------
    | Show error message
    |
    |
    |
    */
    'errors' => [
        'required' => ':attribute is required',
        'required_length' => 'Allow from: <b>:minlength</b> to <b>:maxlength</b>. characters',
        'required_min_length' => 'Allow from: <b>:minlength</b> characters',
        'required_max_length' => 'Allow max: <b>:minlength</b> characters',
        'required-order-by' => 'Required order by',
        'existing-order' => 'Existing order'
    ],


    /*
    |-----------------------------------------------------------------------
    | FIELDS
    |-----------------------------------------------------------------------
    | Column name in table
    |
    |
    |
    */
    'fields' => [
        'id' => 'Category ID',
        'name' => 'Category name',
        'name-context' => 'Context name',
        'description' => 'Description',
        'overview' => 'Overview',
        'slug' => 'Slug',
        'updated_at' => 'Updated at',
        'context-ref' => 'Ref',
        'context-name' => 'Name',
        'context-status' => 'Status',
        'user_full_name' => 'User full name',
        'contact_status' => 'Status',
        'title' => 'Title',
        'status' => 'Status'
    ],


    /*
    |-----------------------------------------------------------------------
    | LABLES
    |-----------------------------------------------------------------------
    | The lables of element in form
    |
    |
    |
    */
    'labels' => [
        'category-name' => 'Category name',
        'overview' => 'Overview',
        'description' => 'Description',
        'context-name' => 'Context name',
        'category' => 'Category name',
        'context' => 'Context name',
        'title-search' => 'Search category',
        'title-search-context' => 'Search contexts',
        'title-backup' => 'Backups',
        'config' => 'Configurations',

        'context_name' => 'Context name',
        'sorting' => 'Sorting',
        'status' => 'Status',

        'context-ref' => 'References',
        'context-key' => 'Context key',
        'context-status' => 'Status',
        'unknown' => 'Unknown',
        'category-slug' => 'Category Slug',
        'category-url' => 'Category URL',
        'category-order' => 'Category order',
        'category-parent' => 'Category parent',
        'image' => 'Image',
        'category-icon' => 'Category icon',
    ],

    'checkboxs' => [
        'context-key' => [
            'add' => 'Regenerate new key',
        ]
    ],


    /*
    |-----------------------------------------------------------------------
    | TABS
    |-----------------------------------------------------------------------
    | The name of tab
    |
    |
    |
      */
    'tabs' => [
        'menu_1' => 'Basic',
        'menu_2' => 'Advance',
        'menu_3' => 'Other',
        'menu_4' => 'Menu 4',
        'menu_5' => 'Menu 5',
        'menu_6' => 'Menu 6',
        'menu_7' => 'Menu 7',
        'menu_8' => 'Menu 8',
        'menu_9' => 'Menu 9',
        'menu_9' => 'Menu 9',
        'guide' => 'Guide',
        'other' => 'Other',
        'basic' => 'Basic',
        'advance' => 'Advance',
    ],


    /*
    |-----------------------------------------------------------------------
    | HEADING
    |-----------------------------------------------------------------------
    |
    |
    |
    |
    */
    'headings' => [
        'form-search' => 'Search categorys',
        'list' => 'List of categorys',
        'search' => 'Search results',
    ],


    /*
    |-----------------------------------------------------------------------
    | CONFIRMS
    |-----------------------------------------------------------------------
    | List of messages for confirm
    |
    |
    |
    */
    'confirms' => [
        'delete' => 'Are you sure you want to delete this item?',
    ],


    /*
    |-----------------------------------------------------------------------
    | ACTIONS
    |-----------------------------------------------------------------------
    |
    |
    |
    |
    */
    'actions' => [
        'add-ok' => 'Add item successfully',
        'add-error' => 'Add item failed',
        'edit-ok' => 'Edit item successfully',
        'edit-error' => 'Edit item failed',
        'delete-ok' => 'Delete item successfully',
        'delete-error' => 'Delete item failed',
    ],


    /*
    |-----------------------------------------------------------------------
    | SEARCH
    |-----------------------------------------------------------------------
    |
    |
    |
    |
    */
    'order' => [
        'by-asc' => 'ASC',
        'by-des' => 'DES',
    ],
];
