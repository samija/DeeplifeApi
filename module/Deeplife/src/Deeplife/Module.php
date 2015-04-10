<?php
namespace Deeplife;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Deeplife\V1\Rest\User\UserMapper' => function ($sm) {
                    $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                    return new \Deeplife\V1\Rest\User\UserMapper($adapter);
                },
            ),
        );
    }
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
}
