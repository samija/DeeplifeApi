<?php
return array(
    'db' => array(
        'adapters' => array(
            'usersAdapter' => array(
                'driver' => 'Pdo_Mysql',
                'database' => 'deeplife',
                'username' => 'root',
                'hostname' => 'localhost',
                //'port' => '80',
            ),
        ),
    ),
);
