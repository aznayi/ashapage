<?php

return [
    'mode'                  => 'utf-8',
    'format'                => 'A4',
    'author'                => '',
    'subject'               => '',
    'keywords'              => '',
    'creator'               => 'Laravel Pdf',
    'display_mode'          => 'fullpage',
    'tempDir'               => base_path('../temp/'),
    'font_path' => base_path('/public/fonts/'),
    'font_data' => [
        'iran' => [
            'R'  => 'IRANSansWeb.ttf',    // regular font
            'B'  => 'IRANSansWeb_Bold.ttf',       // optional: bold font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ]
    ]
];
