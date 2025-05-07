<?php
return [

    //Number of worlds
    'length' => [
        'category_name' => [
            'min' => 3,
            'max' => 255,
        ],
        'category_overview' => [
            'min' => 10,
            'max' => 255,
        ],
        'category_description' => [
            'min' => 25,
            'max' => 0,//unlimit
        ],
    ],

    'name_context_min_length' => 5,
    'name_context_max_length' => 255,

    'per_page' => 15,

    /*
    |-----------------------------------------------------------------------
    | ENVIRONMENT
    |-----------------------------------------------------------------------
    | 0: Development
    | 1: Production
    |
    */
    'env' => 0,
    'load_from' => 'package-category::',

    /*
      |--------------------------------------------------------------------------
      | ITEM STATUS
      |--------------------------------------------------------------------------
      | @public = 99
      | @in_trash = 55 delete from list
      | @draft = 11 auto save
      | @unpublish = 33
     */
    'status' => [
        'publish' => 99,
        'closed' => 88,
        'intrash' => 55,
        'unpublish' => 33,
        'new' => 22,
        'draft' => 11,
        'list' => [
            99 => 'Publish',
            55 => 'In trash',
            33 => 'Unpublish',
            11 => 'Draft',
            88 => 'Closed',
        ],
        'color' => [
            99 => '#5bc0de',
            55 => '#a8aac2',
            33 => '#000000',
            11 => '#ef4832',
            88 => '#aab832',
        ]
    ],


    /*
    |-----------------------------------------------------------------------
    | Permissions
    |-----------------------------------------------------------------------
    | List
    | Edit
    | Add
    | Select
    |
    */
    'permissions' => [
        'list_all' => ['_superadmin', '_user-editor'],
        'list_by_context' => [],
        'edit' => ['_superadmin', '_user-editor'],
        'add' => ['_superadmin', '_user-editor'],
        'delete' => ['_superadmin', '_user-editor'],
    ],


    /*
    |-----------------------------------------------------------------------
    | LANGUAGES
    |-----------------------------------------------------------------------
    | vi
    | en
    |
    */
    'langs' => [
        'en' => 'English',
        'vi' => 'Vietnam'
    ],


    /*
    |-----------------------------------------------------------------------
    | CATEGORY ID
    |-----------------------------------------------------------------------
    |
    |
    |
    |
    */
    'category' => [
        'id_1' => 1, //QC category
        'id_2' => 7, //PG category
    ],

];
