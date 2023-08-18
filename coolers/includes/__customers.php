<?php 
require_once("./includes/config.php");

class dataFetch extends protection{
    private $data = [];

    public function data(){
        $this->getProducts();

        return array(
            "products" => $this->data['products'],
        );

    }
    
    private function getProducts(){
        $conn = $this->conn();

        $stmt = "SELECT * FROM products";
        $stmt = $conn->prepare($stmt);
        $stmt->execute();

        if ($stmt) {
           $result = $stmt->get_result();
           $this->addDataFetched("products", $result);
        }else{
            trigger_error("Mysqli_error");
        }

    }

    private function addDataFetched($key, $val){
        $this->data[$key] = $val;
    }

}