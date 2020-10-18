<?php

use function PHPSTORM_META\map;

$app = [
    'common' => [
        'title_prefix' => 'Laravel Surveillance UI',
        'choose' => "Choose...",
        'confirmation' => "Confirmation",
        'delete' => "Delete",
        'ok' => "Ok",
        'cancel' => "Cancel"
    ],
    'dashboard' => [
        'sidebar_title' => 'Dashboard',
        'page_heading' => 'Surveillance Dashboard'
    ],
    'manager' => [
        'sidebar_title' => 'Manager',
        'page_heading' => 'Surveillance Manager',
        'create' => 'Create New',
        'update' => 'Update',
        'detail' => 'Detail',
        'save' => "Save",
        'delete' => "Remove",
        'actions' => 'Actions',
        'fields' => [
            'type' => "Type",
            'value' => "Value",
            'status' => "Status",
            'id' => "Surveillance ID",
            'surveillance_enabled_at' => "Surveillance Enabled at",
            'surveillance_disabled_at' => "Surveillance Disabled at",
            'access_blocked_at' => "Access Blocked at",
            'access_unblocked_at' => "Access Unblocked at",
            'created_at' => "Created at",
            'updated_at' => "Updated at"
        ]
    ],
    'surveillance_types' => [
        'ip' => "IP Address",
        'user_id' => "User ID",
        'fingerprint' => "Browser Fingerprint"
    ],
    'surveillance_status' => [
        'enable' => "Enabled Surveillance",
        'disable' => "Disabled Surveillance",
        'block' => "Blocked Access",
        'unblock' => "Unblocked Access"
    ],
    'logs' => [
        'sidebar_title' => 'Logs',
        'page_heading' => 'Surveillance Logs',
        'detail' => 'Detail',
        'cancel' => "Cancel",
        'actions' => 'Actions',
        'fields' => [
            'id' => "Log ID",
            'ip' => "IP Address",
            'user_id' => "User ID",
            'fingerprint' => "Browser Fingerprint",
            'url' => "Visited URL",
            'user_agent' => "User Agent",
            'cookies' => "Cookies",
            'session' => "Sessions",
            'files' => "Files",
            'created_at' => "Created at",
            'updated_at' => "Updated at"
        ]
    ],

];

return $app;
