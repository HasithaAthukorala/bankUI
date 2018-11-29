<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/29/18
 * Time: 4:19 AM
 */

include_once "dbcontroller.php";
class Employee
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

    public function getAllApplications(){
        $query = "SELECT * FROM `LoanApplicaton`";
        $this->results = $this->dbcontroller->executeQuery($query);
        return $this->results;
    }

}