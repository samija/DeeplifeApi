<?php
return array(
    'router' => array(
        'routes' => array(
            'users.rest.users' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/users[/:user_id]',
                    'defaults' => array(
                        'controller' => 'users\\V1\\Rest\\Users\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'users.rest.users',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'users\\V1\\Rest\\Users\\UsersResource' => 'users\\V1\\Rest\\Users\\UsersResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'users\\V1\\Rest\\Users\\Controller' => array(
            'listener' => 'users\\V1\\Rest\\Users\\UsersResource',
            'route_name' => 'users.rest.users',
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
            'page_size' => '10',
            'page_size_param' => null,
            'entity_class' => 'users\\V1\\Rest\\Users\\UsersEntity',
            'collection_class' => 'users\\V1\\Rest\\Users\\UsersCollection',
            'service_name' => 'users',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'users\\V1\\Rest\\Users\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'users\\V1\\Rest\\Users\\Controller' => array(
                0 => 'application/vnd.users.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'users\\V1\\Rest\\Users\\Controller' => array(
                0 => 'application/vnd.users.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'users\\V1\\Rest\\Users\\UsersEntity' => array(
                'entity_identifier_name' => 'user_id',
                'route_name' => 'users.rest.users',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'arrayserializable',
            ),
            'users\\V1\\Rest\\Users\\UsersCollection' => array(
                'entity_identifier_name' => 'user_id',
                'route_name' => 'users.rest.users',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'users\\V1\\Rest\\Users\\Controller' => array(
            'input_filter' => 'users\\V1\\Rest\\Users\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'users\\V1\\Rest\\Users\\Validator' => array(
            0 => array(
                'name' => 'User_Id',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => true,
                'description' => 'User Id',
                'error_message' => 'Wrong User_Id',
            ),
            1 => array(
                'name' => 'First_Name',
                'required' => true,
                'filters' => array(),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alpha',
                        'options' => array(),
                    ),
                ),
                'description' => 'First Name of the User',
                'error_message' => 'Wrong First Name',
            ),
            2 => array(
                'name' => 'Last_Name',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'description' => 'Users Last Name',
                'error_message' => 'Wrong Last Name',
            ),
            3 => array(
                'name' => 'User_Name',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'description' => 'Users User Name',
                'error_message' => 'Wrong user name Please correct your user name and type it again.',
            ),
            4 => array(
                'name' => 'Email',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'description' => 'Users Email Address',
                'error_message' => 'Wrong Email Address',
            ),
            5 => array(
                'name' => 'Phone_No',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'description' => 'Users PhoneNo',
                'error_message' => 'Wrong Phone No',
            ),
            6 => array(
                'name' => 'Password',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'description' => 'Users Password',
                'error_message' => 'Wrong Password',
            ),
            7 => array(
                'name' => 'gid',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            8 => array(
                'name' => 'gen',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            9 => array(
                'name' => 'rid',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            10 => array(
                'name' => 'rName',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            11 => array(
                'name' => 'ucid',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            12 => array(
                'name' => 'Catagory_Name',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
        ),
    ),
);
