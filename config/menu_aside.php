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
            'title' => 'Dokumenti',
            'root' => true,
            'icon' => 'media/svg/icons/Menu icons/Document.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/document',
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
                    'title' => 'Seznam strank',
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
                    'title' => 'Seznam izdelkov',
                    'page' => 'products'
                ],
                [
                    'title' => 'Nov izdelek',
                    'page' => 'product/create'
                ]
            ]
        ],
        [
            'title' => 'Partnerji',
            'desc' => '',
            'icon' => 'media/svg/icons/Menu icons/Partner.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Seznam partnerjev',
                    'page' => 'partner'
                ],
                [
                    'title' => 'Nov partner',
                    'page' => 'partner/new'
                ]
            ]
        ],
        [
            'title' => 'Kategorije izdelkov',
            'desc' => '',
            'icon' => 'media/svg/icons/Menu icons/Category.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Seznam kategorij',
                    'page' => 'categories'
                ],
                [
                    'title' => 'Nova kategorija',
                    'page' => 'category/create'
                ]
            ]
        ]
    ]

];
