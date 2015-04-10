<?php
namespace Deeplife\V1\Rest\User;
/**
 * Created by PhpStorm.
 * User: Sami
 * Date: 4/10/15
 * Time: 5:43 PM
 */
use Zend\Db\Sql\Select;
use Zend\Db\Sql;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;

class UserRegMapper
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
        $paginatorAdapter = new DbSelect($select, $this->adapter);
        $collection = new UserRegCollection($paginatorAdapter);

        return $collection;
    }

    /**
     * @param $userId
     * @return bool|UserRegEntity
     */
    public function fetchOne($user_id)
    {
        $sql = 'SELECT * FROM users WHERE User_Id = ?';

        $resultset = $this->adapter->query($sql, array($user_id));
        if (!$resultset)
            return false;
        $entity = $resultset->toArray();
        return $entity;
    }

}