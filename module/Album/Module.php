<?php
// module/Album/Module.php

namespace Album;

class module {
    
    public function getAutoloaderConfig()
    {
        return array(
//            'Zend\Loader\ClassMapAutoloader' => array (
//                __DIR__ . '/autoload_classmap.php',
//            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespace' => __DIR__ . 'src' . __NAMESPACE__,
            ),
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}