<?php
// module/AdManager/config/module.config.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'AdManager\Controller\AdManager' => 'AdManager\Controller\AdManagerController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'ad-manager' => __DIR__ . '/../view',
        ),
    ),
);
 