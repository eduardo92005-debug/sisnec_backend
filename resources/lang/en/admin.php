<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'pessoa' => [
        'title' => 'Pessoas',

        'actions' => [
            'index' => 'Pessoas',
            'create' => 'New Pessoa',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'email' => 'Email',
            'nome' => 'Nome',
            'telefone_1' => 'Telefone 1',
            'telefone_2' => 'Telefone 2',
            
        ],
    ],

    'endereco' => [
        'title' => 'Enderecos',

        'actions' => [
            'index' => 'Enderecos',
            'create' => 'New Endereco',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bairro' => 'Bairro',
            'cep' => 'Cep',
            'cidade' => 'Cidade',
            'complemento' => 'Complemento',
            'estado' => 'Estado',
            'p__fisicas_id' => 'P  fisicas',
            'p__juridicas_id' => 'P  juridicas',
            'rua' => 'Rua',
            
        ],
    ],

    'p-fisica' => [
        'title' => 'P  Fisicas',

        'actions' => [
            'index' => 'P  Fisicas',
            'create' => 'New P  Fisica',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cpf' => 'Cpf',
            'pessoa_id' => 'Pessoa',
            
        ],
    ],

    'p-juridica' => [
        'title' => 'P  Juridicas',

        'actions' => [
            'index' => 'P  Juridicas',
            'create' => 'New P  Juridica',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cnpj' => 'Cnpj',
            'nome_fantasia' => 'Nome fantasia',
            'inscricao_estadual' => 'Inscricao estadual',
            'razao_social' => 'Razao social',
            'pessoa_id' => 'Pessoa',
            
        ],
    ],

    'veiculo' => [
        'title' => 'Veiculos',

        'actions' => [
            'index' => 'Veiculos',
            'create' => 'New Veiculo',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'p__fisicas_id' => 'P  fisicas',
            'p__juridicas_id' => 'P  juridicas',
            
        ],
    ],

    'plano' => [
        'title' => 'Planos',

        'actions' => [
            'index' => 'Planos',
            'create' => 'New Plano',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'p__fisicas_id' => 'P  fisicas',
            'p__juridicas_id' => 'P  juridicas',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];