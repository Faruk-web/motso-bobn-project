<?php

return [
    'name' => 'VesselInfo',
    'permission' => [
        "motorized_craft" => [
            "name" => "Motorize Craft",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "vessel_info_list" => [
            "name" => "Vessel Info List",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "vessel_info_approved_list" => [
            "name" => "Vessel Info Approved List",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "vessel_info_draft_list" => [
            "name" => "Vessel Info Draft List",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "vessel_info_final_list" => [
            "name" => "Vessel Info Final List",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "vessel_info_duplicacy_list" => [
            "name" => "Vessel Info Duplicacy List",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "fishing_area_info" => [
            "name" => "Fishing Area Info",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "fishing_species_info" => [
            "name" => "Fishing Species Info",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "port_info" => [
            "name" => "Port Info",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "vessel_setup_info" => [
            "name" => "Vessel Setup Info",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
        "vessel_info" => [
            "name" => "Vessel Info",
            "type" =>['all','view', 'update', 'create', 'delete']
        ],
    ],
    'status' => [
        'vessel_infos_vessel_class_id' => [
            1 => [
                'id' => 1,
                'name' => 'Yes',
                'value' => 'Yes',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'No',
                'value' => 'No',
                'class' => 'warning',
                'icon' => '',
            ],

        ],
        'user_code' => [
            1 => [
                'id' => 1,
                'name' => '1352',
                'value' => '1352',
                'class' => 'success',
                'icon' => '',
            ],

        ],
        'vessel_infos_yes_no' => [
            1 => [
                'id' => 1,
                'name' => 'Yes',
                'value' => 'Yes',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'No',
                'value' => 'No',
                'class' => 'warning',
                'icon' => '',
            ],

        ],
        'vessel_infos_vessel_ownership_type' => [
            1 => [
                'id' => 1,
                'name' => 'Indivisual',
                'value' => 'Indivisual',
                'class' => 'warning',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Group',
                'value' => 'Group',
                'class' => 'success',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Business/Company',
                'value' => 'Business/Company',
                'class' => 'warning',
                'icon' => '',
            ],

        ],
        'vessel_setup_infos_vessel_setup_type_color' => [
            1 => [
                'id' => 1,
                'name' => 'Red',
                'value' => 'Red',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Pink',
                'value' => 'Pink',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Yellow',
                'value' => 'Yellow',
                'class' => 'warning',
                'icon' => '',
            ],
            4 => [
                'id' => 4,
                'name' => 'Black',
                'value' => 'Black',
                'class' => 'warning',
                'icon' => '',
            ],

        ],
        'vessel_infos_gear_name' => [
            1 => [
                'id' => 1,
                'name' => 'ESBN',
                'value' => 'ESBN',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'MSBN',
                'value' => 'MSBN',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Drift',
                'value' => 'Drift',
                'class' => 'danger',
                'icon' => '',
            ],
            4 => [
                'id' => 4,
                'name' => 'Line And Hook',
                'value' => 'Line And Hook',
                'class' => 'danger',
                'icon' => '',
            ],
        ],
        'vessel_infos_filament' => [
            1 => [
                'id' => 1,
                'name' => 'ESBN',
                'value' => 'ESBN',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'MSBN',
                'value' => 'MSBN',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Drift',
                'value' => 'Drift',
                'class' => 'danger',
                'icon' => '',
            ],

        ],
        'vessel_infos_registered_with_mmo' => [
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
        'vessel_infos_navigation_equipment' => [
            1 => [
                'id' => 1,
                'name' => 'AIS',
                'value' => 'AIS',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'GPS',
                'value' => 'GPS',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Compass',
                'value' => 'Compass',
                'class' => 'danger',
                'icon' => '',
            ],
            4 => [
                'id' => 4,
                'name' => 'Fog Horn',
                'value' => 'Fog Horn',
                'class' => 'danger',
                'icon' => '',
            ],
            5 => [
                'id' => 5,
                'name' => 'Navigaton Lights',
                'value' => 'Navigaton Lights',
                'class' => 'danger',
                'icon' => '',
            ],
        ],
        'vessel_infos_life_saving_equipment' => [
            1 => [
                'id' => 1,
                'name' => 'Life Jacket',
                'value' => 'Life Jacket',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Life bouy',
                'value' => 'Life bouy',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Self igniting light',
                'value' => 'Self igniting light',
                'class' => 'danger',
                'icon' => '',
            ],
            4 => [
                'id' => 4,
                'name' => 'First aid kit',
                'value' => 'First aid kit',
                'class' => 'danger',
                'icon' => '',
            ],
        ],
        'vessel_infos_fire_safety_equipment' => [
            1 => [
                'id' => 1,
                'name' => 'Sand bucket',
                'value' => 'Sand bucket',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Fire extinguisher',
                'value' => 'Fire extinguisher',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Fire pump',
                'value' => 'Fire pump',
                'class' => 'danger',
                'icon' => '',
            ],
        ],
        'vessel_infos_communication_equipment' => [
            1 => [
                'id' => 1,
                'name' => 'Radio receiver',
                'value' => 'Radio receiver',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Commuicatio radio',
                'value' => 'Commuicatio radio',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Mobile phone',
                'value' => 'Mobile phone',
                'class' => 'danger',
                'icon' => '',
            ],
        ],
        'vessel_infos_frequent_fishing_areas' => [
            1 => [
                'id' => 1,
                'name' => 'A',
                'value' => 'A',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'B',
                'value' => 'B',
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'C',
                'value' => 'C',
                'class' => 'danger',
                'icon' => '',
            ],
            4 => [
                'id' => 4,
                'name' => 'D',
                'value' => 'D',
                'class' => 'danger',
                'icon' => '',
            ],
            5 => [
                'id' => 5,
                'name' => 'E',
                'value' => 'E',
                'class' => 'danger',
                'icon' => '',
            ],
            6 => [
                'id' => 6,
                'name' => 'F',
                'value' => 'F',
                'class' => 'danger',
                'icon' => '',
            ],
            7 => [
                'id' => 7,
                'name' => 'G',
                'value' => 'G',
                'class' => 'danger',
                'icon' => '',
            ],
        ],
        'users_port_code' => [
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
        'fishing_area_infos_status' => [
            1 => [
                'id' => 1,
                'name' => 'Active',
                'value' => 'A',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Inactive',
                'value' => 'I',
                'class' => 'warning',
                'icon' => '',
            ],
        ],
        'fishing_species_infos_status' => [
            1 => [
                'id' => 1,
                'name' => 'Active',
                'value' => 'A',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Inactive',
                'value' => 'I',
                'class' => 'warning',
                'icon' => '',
            ],
        ],
        'port_infos_status' => [
            1 => [
                'id' => 1,
                'name' => 'Active',
                'value' => 'A',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Inactive',
                'value' => 'I',
                'class' => 'warning',
                'icon' => '',
            ],
        ],
        'vessel_infos_status' => [
            1 => [
                'id' => 1,
                'name' => 'Approved',
                'value' => 1,
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Pending',
                'value' => 2,
                'class' => 'warning',
                'icon' => '',
            ],
            3 => [
                'id' => 3,
                'name' => 'Reject',
                'value' => 0,
                'class' => 'danger',
                'icon' => '',
            ],
        ],
        'vessel_setup_infos_status' => [
            'A' => [
                'id' => 'A',
                'name' => 'Active',
                'value' => 'A',
                'class' => 'success',
                'icon' => '',
            ],
            'I' => [
                'id' => "I",
                'name' => 'Inactive',
                'value' => 'I',
                'class' => 'warning',
                'icon' => '',
            ],
        ],
        'vessel_setup_infos_type' => [
            'vcl' => [
                'id' => 'vcl',
                'name' => 'Vessel Class',
                'value' => 'vcl',
                'class' => 'success',
                'icon' => '',
            ],
            'ins' => [
                'id' => "ins",
                'name' => 'Insurance',
                'value' => 'ins',
                'class' => 'warning',
                'icon' => '',
            ],
            'vcn' => [
                'id' => "vcn",
                'name' => 'Vessel Cond',
                'value' => 'vcn',
                'class' => 'warning',
                'icon' => '',
            ],
            'vst' => [
                'id' => "vst",
                'name' => 'Minor Type Of Vessel',
                'value' => 'vst',
                'class' => 'warning',
                'icon' => '',
            ],
            'hul' => [
                'id' => "hul",
                'name' => 'Hull',
                'value' => 'hul',
                'class' => 'warning',
                'icon' => '',
            ],
            'clr' => [
                'id' => "clr",
                'name' => 'Color',
                'value' => 'clr',
                'class' => 'warning',
                'icon' => '',
            ],
            'neq' => [
                'id' => "neq",
                'name' => 'Navigation Equipment',
                'value' => 'neq',
                'class' => 'warning',
                'icon' => '',
            ],
            'lse' => [
                'id' => "lse",
                'name' => 'Life Saving Equipment',
                'value' => 'lse',
                'class' => 'warning',
                'icon' => '',
            ],
            'ceq' => [
                'id' => "ceq",
                'name' => 'Communication Equipment',
                'value' => 'ceq',
                'class' => 'warning',
                'icon' => '',
            ],
            'ger' => [
                'id' => "ger",
                'name' => 'Gear',
                'value' => 'ger',
                'class' => 'warning',
                'icon' => '',
            ],
            'flm' => [
                'id' => "flm",
                'name' => 'Fillament',
                'value' => 'flm',
                'class' => 'warning',
                'icon' => '',
            ],
            'lse' => [
                'id' => "lse",
                'name' => 'Life Saving Equipment',
                'value' => 'lse',
                'class' => 'warning',
                'icon' => '',
            ],
        ],
        'page_size' => [
            1 => [
                'id' => 1,
                'name' => 'A4',
                'value' => 'A',
                'class' => 'success',
                'icon' => '',
            ],
            2 => [
                'id' => 2,
                'name' => 'Landscape',
                'value' => 'I',
                'class' => 'warning',
                'icon' => '',
            ],
        ],
        'common' => [
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
            'class' => 'danger',
            'icon' => '',
        ],
    ],
        
    ],
];
