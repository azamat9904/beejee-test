<?php
    define('ROUTES', [
        '' => [
            'controller' => 'task',
            'action' => 'index'
        ],
        'task/index/{page:\d+}' => [
            'controller' => 'task',
            'action' => 'index'
        ],
        "task/createTask" => [
            'controller' => 'task',
            'action' => 'createTask'
        ],
        'user/login' => [
            'controller' => 'user',
            'action' => 'login'
        ],
    ]);