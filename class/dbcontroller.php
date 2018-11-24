<?php
class DBController {
    private $conn = "";
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "bank";

	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->conn = $conn;			
		}
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function executeQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset)) {
            return $resultset;
        }
	}

    function checkExistance($query) {
        $result = mysqli_query($this->conn,$query);
        $num_rows = $result->num_rows;
        $output = null;
        if($num_rows > 0) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['customer_id'] = $row['id'];
            $output = 1;
        }else {
            $output = 0;
        }
        return $output;
    }

	function updateQuery($query){
        $result = mysqli_query($this->conn,$query);
        return $result;
	}
}
?>
