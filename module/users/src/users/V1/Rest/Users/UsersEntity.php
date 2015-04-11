<?php
namespace users\V1\Rest\Users;

class UsersEntity
{
    public $User_Id;
    public $First_Name;
    public $Last_Name;
    public $User_Name;
    public $Email;
    public $Phone_No;
    public $Password;
    public $gid;
    public $gen;
    public $gSen;
    public $rid;
    public $rName;
    public $ucid;
    public $Catagory_Name;

    public function getArrayCopy()
    {
        return array(
            'User_Id' => $this->User_Id,
            'First_name' => $this->First_Name,
            'Last_name' => $this->Last_Name,
            'User_Name' => $this ->User_Name,
            'Email' => $this->Email,
            'Phone_No' => $this->Phone_No,
            'Password' => $this->Password,
            'gid'   => $this->gid,
            'rid'   => $this->rid,
            'rName'  => $this->rName,
            'ucid' => $this->ucid,
            'Catagory_Name'  => $this->Catagory_Name,
        );
    }
    public function exchangeArray(array $array)
    {
         $this->User_Id    = $array['User_Id'];
         $this->First_Name = $array['First_Name'];
         $this->Last_Name  = $array['Last_Name'];
         $this->User_Name  = $array['User_Name'];
         $this->Email      = $array['Email'];
         $this->Phone_No   = $array['Phone_No'];
         $this->Password   = $array['Password'];
         $this->gid  = $array['gid'];
         $this->gen  = $array['gen'];
         $this->rid  = $array['rid'];
         $this->rName  = $array['rName'];
         $this->ucid  = $array['ucid'];
         $this->Catagory_Name  = $array['Catagory_Name'];
    }
}