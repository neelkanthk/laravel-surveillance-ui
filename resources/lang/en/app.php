<?php

use function PHPSTORM_META\map;

$app = [
    'common' => [
        'title_prefix' => 'Laravel Surveillance UI',
        'choose' => "Choose...",
        'delete_confirmation' => "Click 'Delete' to confirm the action.",
        'delete' => "Delete",
        'ok' => "Ok",
        'cancel' => "Cancel"
    ],
    'dashboard' => [
        'sidebar_title' => 'Surveillance Dashboard',
        'page_heading' => 'Surveillance Dashboard'
    ],
    'manager' => [
        'sidebar_title' => 'Surveillance Manager',
        'page_heading' => 'Surveillance Manager',
        'create' => 'Create New',
        'update' => 'Update Status',
        'detail' => 'Surveillance Detail',
        'save' => "Save",
        'delete' => "Delete",
        'actions' => 'Actions',
        'fields' => [
            'id' => "Surveillance ID",
            'type' => "Type",
            'value' => "Value",
            'status' => "Status",
            'surveillance_enabled_at' => "Surveillance Enabled at",
            'surveillance_disabled_at' => "Surveillance Disabled at",
            'access_blocked_at' => "Access Blocked at",
            'access_unblocked_at' => "Access Unblocked at",
            'created_at' => "Created at",
            'updated_at' => "Updated at"
        ],
        'filters' => [
            'type' => 'Filter by Type',
            'status' => 'Filter by Status'
        ]
    ],
    'surveillance_types' => [
        'ip' => "IP Address",
        'userid' => "User ID",
        'fingerprint' => "Browser Fingerprint"
    ],
    'surveillance_status' => [
        'enable' => "Enabled Surveillance",
        'disable' => "Disabled Surveillance",
        'block' => "Blocked Access",
        'unblock' => "Unblocked Access"
    ],
    'logs' => [
        'sidebar_title' => 'Surveillance Logs',
        'page_heading' => 'Surveillance Logs',
        'detail' => 'Detail',
        'cancel' => "Cancel",
        'delete' => "Delete",
        'actions' => 'Actions',
        'fields' => [
            'id' => "Log ID",
            'ip' => "IP Address",
            'userid' => "User ID",
            'fingerprint' => "Fingerprint",
            'url' => "Visited URL",
            'user_agent' => "User Agent",
            'cookies' => "Cookies",
            'session' => "Sessions",
            'files' => "Files",
            'created_at' => "Created at",
            'updated_at' => "Updated at"
        ],
        'filters' => [
            'date_range' => 'Filter by date and time range'
        ]
    ],
    'alerts' => [
        'surveillance_already_enabled' => 'Surveillance already enabled',
        'surveillance_enable_success' => 'Surveillance enabled',
        'surveillance_enable_error' => 'Some error occured during enabling surveillance.',
        'surveillance_disable_success' => 'Surveillance disabled',
        'surveillance_disable_error' => 'Some error occured during disabling surveillance.',
        'access_already_blocked' => 'Access already blocked',
        'access_block_success' => 'Access blocked',
        'access_block_error' => 'Some error occured during blocking access.',
        'access_unblock_success' => 'Access unblocked',
        'access_unblock_error' => 'Some error occured during unblocking access.',
        'record_delete_success' => "Surveillance record has been deleted.",
        'log_delete_success' => "Surveillance log has been deleted.",
        'generic_error' => 'Some error occured.',
        'not_found' => 'Data not found.'
    ]
];

return $app;
