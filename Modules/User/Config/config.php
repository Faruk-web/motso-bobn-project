<?php

return [
    'name' => 'User',
    'permission' => [
            "user" => [
                "name" => "User Management",
                "type" =>['all','view', 'update', 'create', 'delete']
            ],
            "user_setting" => [
                "name" => "User Setting",
                "type" =>['all','view', 'update', 'create', 'delete']
            ],
            "user_role" => [
                "name" => "Role Management",
                "type" =>['all','view', 'update', 'create', 'delete',]
            ],
            "user_dashboard" => [
                "name" => "Dashboard Manage",
                "type" =>['all','view', 'update', 'create', 'delete',]
            ],
            "user_branch" => [
                "name" => "Branch Manage",
                "type" =>['all','view', 'update', 'create', 'delete',]
            ],
            "manage_menu" => [
                "name" => "Manage Menu",
                "type" =>['all','view', 'update', 'create', 'delete',]
            ],
            "user_module" => [
                "name" => "Module Manage",
                "type" =>['all','view', 'update', 'create', 'delete',]
            ],
            "manage_post" => [
                "name" => "Post Manage",
                "type" =>['all','view', 'update', 'create', 'delete',]
            ],
            "manage_post_report" => [
                "name" => "Report Manage",
                "type" =>['all','view', 'update', 'create', 'delete',]
            ],
        ],
    'status' => [
        'menus_status' => [
            1 => [
                'id' => 1,
                'name' => 'Human Resource',
                'value' => 'active',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Account',
                'value' => 'inactive',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Google',
                'value' => 'inactive',
                'class' => 'danger',
                'icon' => '',
            ],
        ],
        'branch_status' => [
            1 => [
                'id' => 1,
                'name' => 'Active',
                'value' => 'active',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Inactive',
                'value' => 'inactive',
                'class' => 'warning',
                'icon' => '',
            ],
        ],
        'year_built_status' => [
            2030 => [
                'id' => 2030,
                'name' => '2030',
                'value' => '2030',
                'class' => 'success',
                'icon' => '',
            ],
            2029 => [
                'id' => 2029,
                'name' => '2029',
                'value' => '2029',
                'class' => 'warning',
                'icon' => '',
            ],
            2028 => [
                'id' => 2028,
                'name' => '2028',
                'value' => '2028',
                'class' => 'warning',
                'icon' => '',
            ],
            2027 => [
                'id' => 2027,
                'name' => '2027',
                'value' => '2027',
                'class' => 'warning',
                'icon' => '',
            ],
            2026 => [
                'id' => 2026,
                'name' => '2026',
                'value' => '2026',
                'class' => 'warning',
                'icon' => '',
            ],
            20265=> [
                'id' => 2026,
                'name' => '2026',
                'value' => '2026',
                'class' => 'warning',
                'icon' => '',
            ],
            2025 => [
                'id' => 2025,
                'name' => '2025',
                'value' => '2025',
                'class' => 'warning',
                'icon' => '',
            ],
            2024 => [
                'id' => 2024,
                'name' => '2024',
                'value' => '2024',
                'class' => 'warning',
                'icon' => '',
            ],
            2023 => [
                'id' => 2023,
                'name' => '2023',
                'value' => '2023',
                'class' => 'warning',
                'icon' => '',
            ],
            2021 => [
                'id' => 2022,
                'name' => '2022',
                'value' => '2022',
                'class' => 'warning',
                'icon' => '',
            ],
            2021 => [
                'id' => 2021,
                'name' => '2021',
                'value' => '2021',
                'class' => 'warning',
                'icon' => '',
            ],
            2020 => [
                'id' => 2020,
                'name' => '2020',
                'value' => '2020',
                'class' => 'warning',
                'icon' => '',
            ],
            2019 => [
                'id' => 2019,
                'name' => '2019',
                'value' => '2019',
                'class' => 'warning',
                'icon' => '',
            ],
            2018 => [
                'id' => 2018,
                'name' => '2018',
                'value' => '2018',
                'class' => 'warning',
                'icon' => '',
            ],
            2017 => [
                'id' => 2017,
                'name' => '2017',
                'value' => '2017',
                'class' => 'warning',
                'icon' => '',
            ],
            2016 => [
                'id' => 2016,
                'name' => '2016',
                'value' => '2016',
                'class' => 'warning',
                'icon' => '',
            ],
            2015 => [
                'id' => 2015,
                'name' => '2015',
                'value' => '2015',
                'class' => 'warning',
                'icon' => '',
            ],
            2014 => [
                'id' => 2014,
                'name' => '2014',
                'value' => '2014',
                'class' => 'warning',
                'icon' => '',
            ],
            2013 => [
                'id' => 2013,
                'name' => '2013',
                'value' => '2013',
                'class' => 'warning',
                'icon' => '',
            ],
            2012 => [
                'id' => 2012,
                'name' => '2012',
                'value' => '2012',
                'class' => 'warning',
                'icon' => '',
            ],
            2011 => [
                'id' => 2011,
                'name' => '2011',
                'value' => '2011',
                'class' => 'warning',
                'icon' => '',
            ],
            2010 => [
                'id' => 2010,
                'name' => '2010',
                'value' => '2010',
                'class' => 'warning',
                'icon' => '',
            ],
            2009 => [
                'id' => 2009,
                'name' => '2009',
                'value' => '2009',
                'class' => 'warning',
                'icon' => '',
            ],
            2007 => [
                'id' => 2007,
                'name' => '2007',
                'value' => '2007',
                'class' => 'warning',
                'icon' => '',
            ],
            2006 => [
                'id' => 2006,
                'name' => '2006',
                'value' => '2006',
                'class' => 'warning',
                'icon' => '',
            ],
            2005 => [
                'id' => 2005,
                'name' => '2005',
                'value' => '2005',
                'class' => 'warning',
                'icon' => '',
            ],
            2004 => [
                'id' => 2004,
                'name' => '2004',
                'value' => '2004',
                'class' => 'warning',
                'icon' => '',
            ],
            2003 => [
                'id' => 2003,
                'name' => '2003',
                'value' => '2003',
                'class' => 'warning',
                'icon' => '',
            ],
            2002 => [
                'id' => 2002,
                'name' => '2002',
                'value' => '2002',
                'class' => 'warning',
                'icon' => '',
            ],
            2001 => [
                'id' => 2001,
                'name' => '2001',
                'value' => '2001',
                'class' => 'warning',
                'icon' => '',
            ],
            2000 => [
                'id' => 2000,
                'name' => '2000',
                'value' => '2000',
                'class' => 'warning',
                'icon' => '',
            ],
        ],
    ]
];
