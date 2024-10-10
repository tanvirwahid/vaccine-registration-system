<?php

return [
    'validation_rules' => [
        'name' => 'required',
        'email' => 'required',
        'nid' => 'required|unique:users,nid',
        'date_of_birth' => 'required',
        'vaccine_center_id' => 'required|exists:vaccine_centers,id'
    ],

    'columns' => [
        'name',
        'email',
        'nid',
        'date_of_birth'
    ]
];
