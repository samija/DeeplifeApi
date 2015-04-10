<?php
namespace Deeplife\V1\Rest\User;

class UserResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Deeplife\V1\Rest\User\UserMapper');
        return new UserResource();
    }
}
