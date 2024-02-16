<?php

$comissao = [
    [
        'text' => 'Cadastro de Comissão',
        'url' => config('app.url').'/comissao',
    ],
    [
        'text' => 'Cadastro de Documentos',
        'url' => config('app.url').'/documentos',
    ]
];

$empresas = [
    [
        'text'  => 'Cadastro (Proposta de Convênio)',
        'url'   => config('app.url').'/empresa/create',
    ],
    [
        'text'  => 'Cadastro de Frequencia do Estagiário',
        'url'   => config('app.url').'/empresa/frequencia',
        'can'   => 'empresa'
    ]
];

$menu = [
    [
        'text' => '<i class="fas fa-home"></i> Home',
        'url' => config('app.url').'/home',
    ],
    [
        # este item de menu será substituido no momento da renderização
        'key' => 'menu_dinamico',
    ],
    [
        'text' => 'Empresas',
        'submenu' => $empresas
    ],
    [
        'text' => 'Comissao',
        'submenu' => $comissao,
        'can' => 'comissao'
    ],
];

$right_menu = [
    [
        // menu utilizado para views da biblioteca senhaunica-socialite.
        'key' => 'senhaunica-socialite',
    ],
];

return [
    # valor default para a tag title, dentro da section title.
    # valor pode ser substituido pela aplicação.
    'title' => config('app.name'),

    # USP_THEME_SKIN deve ser colocado no .env da aplicação
    'skin' => env('USP_THEME_SKIN', 'uspdev'),

    # chave da sessão. Troque em caso de colisão com outra variável de sessão.
    'session_key' => 'laravel-usp-theme',

    # usado na tag base, permite usar caminhos relativos nos menus e demais elementos html
    # na versão 1 era dashboard_url
    'app_url' => config('app.url'),

    # login e logout
    'logout_method' => 'POST',
    'logout_url' => 'logout',
    'login_url' => 'login',

    # menus
    'menu' => $menu,
    'right_menu' => $right_menu,

    # mensagens flash - https://uspdev.github.io/laravel#31-mensagens-flash
    'mensagensFlash' => true,

    # container ou container-fluid
    'container' => 'container-fluid',

];
