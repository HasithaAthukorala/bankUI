<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/23/18
 * Time: 7:58 PM
 */

include_once "../class/dbcontroller.php";

class Customer
{
    private $results = array();
    private $dbcontroller = "";

    public function __construct()
    {
        $dbcontroller = new DBController();
        if (!empty($dbcontroller)) {
            $this->dbcontroller = $dbcontroller;
        }
    }

    /*
        you should hookup the DAO here
    */

    public function userLogin($username, $password)
    {
        $username = $this->dbcontroller->connectDB()->real_escape_string($username);
        $password = $this->dbcontroller->connectDB()->real_escape_string($password);
//        $query = "SELECT COUNT(*) AS 'result' FROM UserLogin WHERE EXISTS(SELECT passsword
//             FROM UserLogin
//             WHERE username = '{$username}'
//               AND password = MD5('{$password}')
//               AND role = 'user');";
        $query = "SELECT * FROM `UserLogin` WHERE `username` = '{$username}' AND `passsword` = MD5('{$password}')";
        $this->results = $this->dbcontroller->checkExistance($query);


        return $this->results;
    }
}