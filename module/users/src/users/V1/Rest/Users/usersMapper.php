<?php
namespace users\V1\Rest\Users;

use Zend\Db\Sql\Select;
use Zend\Db\Sql;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;
use ZFTest\ApiProblem\ApiProblemTest;

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
    public function fetchAll($params)
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

    /**
    /**
     * @param $data
     * @return string
     */
    public function create($data)
    {
         $data= (array) $data;
            $data[User_Id]= '';
        $sql= "INSERT INTO `deeplife v1`.`users` (`User_Id`,`First_Name`, `Last_Name`, `User_Name`, `Email`, `Phone_No`, `Password`)
                    VALUES ('$data[User_Id]','$data[First_Name]','$data[Last_Name]','$data[User_Name]','$data[Email]','$data[Phone_No]','$data[Password]')";
        $this->adapter->query($sql,$data);
        return  ;
    }
}