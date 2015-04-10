<?php
return array(
    'router' => array(
        'routes' => array(
            'deeplife.rest.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'Deeplife\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'deeplife.rest.user',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Deeplife\\V1\\Rest\\User\\UserResource' => 'Deeplife\\V1\\Rest\\User\\UserResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'Deeplife\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'Deeplife\\V1\\Rest\\User\\UserResource',
            'route_name' => 'deeplife.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'users',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Deeplife\\V1\\Rest\\User\\UserEntity',
            'collection_class' => 'Deeplife\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'User',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Deeplife\\V1\\Rest\\User\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Deeplife\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.deeplife.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Deeplife\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.deeplife.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Deeplife\\V1\\Rest\\User\\UserEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'deeplife.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Deeplife\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'deeplife.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Deeplife\\V1\\Rest\\User\\Controller' => array(
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
);
