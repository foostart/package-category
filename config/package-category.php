<?php
return [

    'name_category_min_length' => 5,
    'name_category_max_length' => 255,

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
    |-----------------------------------------------------------------------
    | CONTEXTS
    |-----------------------------------------------------------------------
    | Users
    | Groups
    | Permissions
    |
    */
    'contexts' => [

        'users'         => [
                                'key' => '1d13bdfe323c1d13bfe323c1d13bdfe323c',
                                'route' => 'users.list',
                                'name' => 'Users',
                            ],

        'groups'        => [
                                'key' => '2a99aae4d5152a99a4d5152a99aae4d5152',
                                'route' => 'groups.list',
                                'name' => 'Groups',
                            ],

        'permissions'   => [
                                'key' => '4bc83dbd2fef4bbd2fef4bc83dbd2dbd2ef',
                                'route' => 'permissions.list',
                                'name' => 'Permissions',
                            ],
        'statuses' => [
            '1' => 'Active',
            '0' => 'Disable',
        ]

    ],

    /*
    |-----------------------------------------------------------------------
    | Permissions test
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
    ]
];