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
        'any'   => 'Any',
        'order' => '#',
        'category-name' => 'Category name',
        'user-full-name' => 'User full name',
        'name-context' => 'Context name',
        'operations' => 'Operations',
        'updated_at' => 'Updated at',
        'filename' => 'File name',
        'ref' => 'Ref',
        'key' => 'Key',
        'status' => 'Status',
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
        'overview' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'description' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'context-form' => 'Context form',
        'update' => 'Update category',
        'category-name' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'category' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'list' => 'List of items',
        'counters' => 'There are <b>:number</b> items',
        'counter' => 'There is <b>:number</b> item',
        'not-found' => 'Not found items',
        'config' => 'List of configurations',
        'lang' => 'List of languages',
        'context-name' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'context-ref' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'context-key' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'context-status' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
        'status' => '<blockquote class="quote-card">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </blockquote>',
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
        'updated_at' => 'Updated at'
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
        'menu_4' => 'Other',
        'menu_5' => 'Other',
        'menu_6' => 'Other',
        'menu_7' => 'Other',
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
];