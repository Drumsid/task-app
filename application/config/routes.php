<?php

return [

    '' => [
        'controller' => 'task',
        'action' => 'index'
    ],

    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register'
    ],

    'account/create' => [
        'controller' => 'account',
        'action' => 'create'
    ],

    'account/check' => [
        'controller' => 'account',
        'action' => 'checkLogin'
    ],

    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout'
    ],
    
    'task/create' => [
        'controller' => 'task',
        'action' => 'create'
    ],

    'task/store' => [
        'controller' => 'task',
        'action' => 'store'
    ],

    'task/show' => [
        'controller' => 'task',
        'action' => 'show'
    ],

    'task/sort' => [
        'controller' => 'task',
        'action' => 'index'
    ],

    'task/edit' => [
        'controller' => 'task',
        'action' => 'edit'
    ],

    'task/update' => [
        'controller' => 'task',
        'action' => 'update'
    ],

    'dashboard' => [
        'controller' => 'account',
        'action' => 'dashboard'
    ]

];
