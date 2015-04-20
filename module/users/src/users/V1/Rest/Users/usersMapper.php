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
    public function fetchAll()
    {
// $select= 'SELECT `users`.*,`urole`.`rName`,`user_info`.`Description`,`user_info`.`ment_id`,`user_info`.`generation`,`user_info`.`catagory`,`user_info`.`country` FROM users
//LEFT JOIN `deeplife`.`user_info` ON `users`.`Phone_No` = `user_info`.`Phone_No`
//LEFT JOIN `deeplife`.`user_info` ON `users`.`User_Id` = `user_info`.`User_Id`
//LEFT JOIN `deeplife`.`user_info` ON `users`.`User_Id` = `user_info`.`ment_id`
//LEFT JOIN `deeplife`.`urole` ON `user_info`.`rid` = `urole`.`rid` ';
       $select = new Select('forget');
       $paginatorAdapter = new DbSelect($select,$this->adapter);
      //  $paginatorAdapter = $this->adapter->query($select);
       $collection = new UsersCollection($paginatorAdapter);

     return $collection;
      // return $paginatorAdapter;
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
        $sql = 'SELECT DISTINCTROW * FROM forget WHERE User_Id = ?';

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
        $sql= "INSERT INTO `users`(`User_Id`, `First_Name`, `Middle_Name`, `Sure_Name`, `Email`, `Phone_No`, `Password`, `Image`)
                  VALUES ('$data[User_Id]','$data[First_Name]','$data[Middle_Name]','$data[Sure_Name]','$data[Email]','$data[Phone_No]','$data[Password]','$data[Image]')";
        $this->adapter->query($sql,$data);
        $sql2= "INSERT INTO `user_info`(`uiid`, `ment_id`, `Description`, `Longtiude`, `Latitude`, `rid`, `Phone_No`, `country`, `catagory`, `generation`, `User_Id`)
                          VALUES ('$data[User_Id]','$data[ment_id]','$data[Description]','$data[Longtiude]','$data[Latitude]','$data[rid]','$data[Phone_No]','$data[country]','$data[catagory]','$data[generation]',last_insert_id())";
        $this->adapter->query($sql2,$data);
           return  ;
    }
     public function delete($id)
    {
       $sql= 'DELETE FROM `users` WHERE User_Id = ?';
       $sql1= 'DELETE FROM `user_info` WHERE User_Id = ?';
        $this->adapter->query($sql,array($id));
        $this->adapter->query($sql1,array($id));
           return  ;
    }
    PUBLIC FUNCTION UPDATE($id,$data)
    {
               $data= (array) $data;
        $sql='UPDATE `users` SET `First_Name`= $data[First_Name],`Middle_Name`=$data[Middle_Name],`Sure_Name`=$data[Sure_Name],
                        `Email`=$data[Email],`Phone_No`=$data[Phone_No],`Password`=$data[Password],`Image`=$data[Image] WHERE `User_Id`= $id';
        $sql1='UPDATE `user_info` SET `ment_id`=$data[ment_id],`Description`=$data[Description],`Longtiude`=$data[Longtiude],
                 `Latitude`=$data[Latitude],`rid`=$data[rid],`Phone_No`=$data[Phone_No]
                 ,`country`=$data[country],`catagory`=$data[catagory],`generation`=$data[generation] WHERE `User_Id`= $id';
        $this->adapter->query($sql,$data,array($id));
        $this->adapter->query($sql1,$data,array($id));
                     return ;
    }
}