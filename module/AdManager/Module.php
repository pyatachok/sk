<?php
// module/AdManager/Module.php

namespace AdManager;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;


use AdManager\Model\Ad;
use AdManager\Model\AdTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
 
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig() 
    {
	return array(
	    'factories' => array(
		'AdManagerModelAdTable' => function ($sm) {
		    $tableGateway = $sm->get('AdTableGateway');
		    $table = new AdTable($tableGateway);
		    return $table;
		},
		'AdTableGateway' => function ($sm) {
		    $dbAdapter = $sm->get('ZendDbAdapterAdapter');
		    $resultSetPrototype = new ResultSet();
		    $resultSetPrototype->setArrayObjectPrototype(new Ad());
		    return new TableGateway('ad', $dbAdapter, null, $resultSetPrototype);
		},
		'AdManagerModelPublisherTable' => function ($sm) {
		    $tableGateway = $sm->get('PublisherTableGateway');
		    $table = new PublisherTable($tableGateway);
		    return $table;
		},
		'PublisherTableGateway' => function ($sm) {
		    $dbAdapter = $sm->get('ZendDbAdapterAdapter');
		    $resultSetPrototype = new ResultSet();
		    $resultSetPrototype->setArrayObjectPrototype(new Publisher());
		    return new TableGateway('publisher', $dbAdapter, null, $resultSetPrototype);
		}
		
	    )
		
	    
	);
    }
    
    
}


