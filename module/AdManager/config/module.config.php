<?php

// module/AdManager/config/module.config.php:
namespace AdManager;


return array(
   // Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
    'controllers' => array(
	'invokables' => array(
	    'AdManager\Controller\AdManager' => 'AdManager\Controller\AdManagerController',
	),
    ),
    // The following section is new and should be added to your file
    'router' => array(
	'routes' => array(
	    'ad-manager' => array(
		'type' => 'segment',
		'options' => array(
		    'route' => '/ad-manager[/:action][/:id]',
		    'constraints' => array(
			'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
			'id' => '[0-9]+',
		    ),
		    'defaults' => array(
			'controller' => 'AdManager\Controller\AdManager',
			'action' => 'index',
		    ),
		),
	    ),
	),
    ),
    'view_manager' => array(
	'template_path_stack' => array(
	    'ad-manager' => __DIR__ . '/../view',
	),
    ),
);

