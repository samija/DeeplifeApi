<?php
namespace users\V1\Rest\Users;

class UsersResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('users\V1\Rest\Users\usersMapper');
        return new UsersResource($mapper);
    }
}
