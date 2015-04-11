<?php
namespace users\V1\Rest\Users;

use Zend\Db\Sql\Select;
use Zend\Db\Sql;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;

class UsersMapper
{
    protected $adapter;

    /**S
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return UserRegCollection
     */
    public function fetchAll()
    {
       $select = new Select('users');
       $paginatorAdapter = new DbSelect($select,$this->adapter);
        $collection = new UsersCollection($paginatorAdapter);

        return $collection;
    }

    /**
     * @param $user_id
     * @internal param $userId
     * @return bool|UserSEntity
     */
    public function fetchOne($user_id)
    {
        $sql = 'SELECT * FROM users WHERE user_id = ?';

        $resultset = $this->adapter->query($sql,array($user_id));
        $result=$resultset->toArray();
        if(!$result)
            return false;
        $entity = new UsersEntity();
        $entity->exchangeArray($result[0]);
        return $entity;
    }
}