<?php
namespace users;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'users\V1\Rest\users\UsersMapper' =>  function ($sm) {
                    $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                    return new \users\V1\Rest\Users\UsersMapper($adapter);
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
