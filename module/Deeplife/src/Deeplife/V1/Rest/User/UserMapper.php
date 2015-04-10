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

class UserMapper
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
     * @return UserCollection
     */
    public function fetchAll()
    {
        $select = new Select('users');
        $paginatorAdapter = new DbSelect($select, $this->adapter);
        $collection = new UserCollection($paginatorAdapter);

        return $collection;
    }

    /**
     * @param $User_Id
     * @return bool|UserEntity
     */
    public function fetchOne($User_Id)
    {
        $sql = 'SELECT * FROM users WHERE User_Id = ?';

        $resultset = $this->adapter->query($sql, array($User_Id));
        if (!$resultset)
            return false;
        $entity = $resultset->toArray();
        return $entity;
    }

}