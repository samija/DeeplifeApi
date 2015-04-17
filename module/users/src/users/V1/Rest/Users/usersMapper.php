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
// $select= 'SELECT `user_info`.*,`urole`.`rName`,`generation`.`gen`,`ucatagory`.`Catagory_Name`,`users`.* FROM user_info
//LEFT JOIN `deeplife`.`generation` ON `user_info`.`gid` = `generation`.`gid`
//LEFT JOIN `deeplife`.`urole` ON `user_info`.`rid` = `urole`.`rid`
//LEFT JOIN `deeplife`.`ucatagory` ON `user_info`.`ucid` = `ucatagory`.`ucid`
//LEFT JOIN `deeplife`.`users` ON `user_info`.`user_id` = `users`.`User_Id`' ;
       $select = new Select('allfiled');
       $paginatorAdapter = new DbSelect($select,$this->adapter);
     //   $paginatorAdapter = $this->adapter->query($select);
        $collection = new UsersCollection($paginatorAdapter);

        return $collection;
//        return $paginatorAdapter;
//          $resulutset=$select;
//        $collection = new UsersCollection($resulutset);
//        return $collection ;
    }

    /**
     * @param $user_id
     * @internal param $userId
     * @return bool|UserSEntity
     */
    public function fetchOne($User_Id)
    {
        $sql = 'SELECT * FROM allfiled WHERE User_Id = ?';

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
       $ph_no =$data['Phone_No'];
        $sql= "INSERT INTO `users` (`User_Id`,`First_Name`,`Last_Name`,`User_Name`,`Email`,`Phone_No`,`Password`)
                      VALUES ('$data[User_Id]','$data[First_Name]','$data[Last_Name]','$data[User_Name]','$data[Email]','$data[Phone_No]','$data[Password]')";
//        $sql_id= 'SELECT `users`.`User_Id` FROM users
//                          WHERE `Phone_No`= ?';
        $this->adapter->query($sql,$data);
//        $result= $this->adapter->query('SELECT `users`.`User_Id` FROM users WHERE `Phone_No`= ?',array($ph_no));
//        $data['ta']=$result.
        $sql2= "INSERT INTO `user_info`(`user_id` ,`rid`,`gid`,`ucid`,`Description`,`uiid`,`Phone_No`)
                       VALUES (last_insert_id(),'$data[rid]','$data[gid]','$data[ucid]','$data[Description]','$data[uiid]','$data[Phone_No]')";
        $this->adapter->query($sql2,$data);
           return  ;
    }
}