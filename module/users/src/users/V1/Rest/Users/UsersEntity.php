<?php
namespace users\V1\Rest\Users;

class UsersEntity
{
    public $user_id;
    public $First_Name;
    public $Last_Name;
    public $Username;
    public $Email;
    public $Phone_No;
    public $Password;
    public $gid;
    public $gen;
    public $rid;
    public $rName;
    public $ucid;
    public $Catagory_Name;

    public function getArrayCopy()
    {
        return array(
            'user_id' => $this->user_id,
            'First_name' => $this->First_name,
            'Last_name' => $this->Last_name,
            'Email' => $this->Email,
            'Phone_No' => $this->Phone_No,
            'Password' => $this->Password,
        );
    }
    public function exchangeArray(array $array)
    {
         $this->user_id    = $array['user_id'];
         $this->First_name = $array['First_name'];
         $this->Last_name  = $array['Last_name'];
         $this->Email      = $array['Email'];
         $this->Phone_No   = $array['Phone_No'];
         $this->Password   = $array['Password'];
    }
}