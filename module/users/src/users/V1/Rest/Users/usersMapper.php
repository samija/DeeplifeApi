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
    public function fetchOne($User_Id)
    {
        $sql = 'SELECT * FROM users WHERE User_Id = ?';

        $resultset = $this->adapter->query($sql,array($User_Id));
        $result=$resultset->toArray();
//        if(!$result)
//            return false;
//        $entity = new UsersEntity();
//        $entity->exchangeArray($result[0]);
        return $result;
    }
    public function creat($data)
    {
        $data = (array)$data;
        $sql= 'INSERT INTO  users.First_Name, users.Last_Name, users.User_Name, users.Email, users.Phone_No, users.Password)
        VALUES ($data[First_Name],$data[Last_Name],$data[User_Name],$data[Email],$data[Phone_No],$data[Password])';
        $this->adapter->query($sql);
        return  ;
    }
}