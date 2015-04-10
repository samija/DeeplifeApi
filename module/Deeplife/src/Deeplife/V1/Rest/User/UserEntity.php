<?php
namespace Deeplife\V1\Rest\User;

class UserEntity
{
    public $User_Id;
    public $First_Name;
    public $Last_Name;
    public $User_Name;
    public $Email;
    public $Phone_No;
    public $Password;
    public $catagory;

    /* the following  two function are  possible becouse of the
    Haydrator (arrayseralizable) which was selected by defualt.
    */
    public function getArrayCopy()
    {
        return array(
            'user_id'      => $this-> User_Id,
            'First_Name'  => $this-> First_Name,
            'Last_Name'   => $this-> Last_Name,
            'Username'   => $this-> User_Name,
            'Email'         => $this-> Email,
            'Phone_No'    => $this-> Phone_No,
            'Password'    => $this-> Password,
        );
    }
    /*	public function exchangeArray(array $array)
    {
        $this-> userId     =$array['userId'];
        $this-> first_name =$array['first_name'];
        $this-> last_name  =$array['last_name'];
        $this-> age        =$array['age'];
        $this-> catagory   =$array['catagory'];
     }
        */



}
