<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/25/18
 * Time: 12:49 AM
 */

class Bank
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

    public function getAllBranches(){
        $query = "SELECT * FROM `Branch`";
        $this->results = $this->dbcontroller->executeQuery($query);
        return $this->results;
    }
}