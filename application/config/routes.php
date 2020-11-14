<?php
    define('ROUTES', [
        '' => [
            'controller' => 'task',
            'action' => 'index'
        ],
        'task/sort' => [
            'controller' => 'task',
            'action' => 'sort'
        ],
        'task/index/{page:\d+}' => [
            'controller' => 'task',
            'action' => 'index'
        ],
        "task/createTask" => [
            'controller' => 'task',
            'action' => 'createTask'
        ],
        "task/edit/{id:\d+}" => [
            'controller' => 'task',
            'action' => 'edit'
        ],
        'user/login' => [
            'controller' => 'user',
            'action' => 'login'
        ],
        'user/logout' => [
            'controller' => 'user',
            'action' => 'logout'
        ],
    ]);