<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Domov',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],
        [
            'title' => 'Računi',
            'root' => true,
            'icon' => 'media/svg/icons/Menu icons/Document.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/invoices',
            'new-tab' => false,
        ],

        // Šifranti
        [
            'section' => 'Šifranti',
        ],
        [
            'title' => 'Stranke',
            'desc' => '',
            'icon' => 'media/svg/icons/Menu icons/Customer.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Stranke',
                    'page' => 'clients'
                ],
                [
                    'title' => 'Nova stranka',
                    'page' => 'client/create'
                ]
            ]
        ],
        [
            'title' => 'Izdelki',
            'desc' => '',
            'icon' => 'media/svg/icons/Menu icons/Item.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Izdelki',
                    'page' => 'products'
                ],
                [
                    'title' => 'Kategorije',
                    'page' => 'categories'
                ]
            ]
        ],
    ]

];
