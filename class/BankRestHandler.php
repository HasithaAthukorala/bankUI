<?php
require_once("SimpleRest.php");
require_once("Customer.php");
		
class BankRestHandler extends SimpleRest {

    function userLogin($username,$password) {

        $mobile = new Customer();
        $rawData = $mobile->userLogin($username,$password);

        if(empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'No users found!');
        } else {
            $statusCode = 200;
        }

        $requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
        $this ->setHttpHeaders($requestContentType, $statusCode);

        $result["output"] = $rawData;
//        echo json_encode($result["output"]["0"]);
//        print_r($rawData);

        if(strpos($requestContentType,'application/json') !== false){
            $response = $this->encodeJson($rawData["0"]);
            echo $response;
        }
    }

    public function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;
    }

}
?>