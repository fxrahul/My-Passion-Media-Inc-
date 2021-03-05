<?php
session_start();
require 'connection.php';
class Product{
    private $weight;
    private $length;
    private $breadth;
    private $height;
    public function setProductWeight($weight){
        $this -> weight = $weight;
    }
    public function setProductDimension($length, $breadth, $height){
        $this -> length = $length;
        $this -> breadth = $breadth;
        $this -> height = $height;
    }
    public function getProductWeight(){
        return $this -> weight;
    }
    public function getProductDimension(){
        return array($this -> length, $this -> breadth, $this -> height);
    } 
}
    if(isset($_POST['submit'])){
        $product = new Product();
        $product -> setProductWeight(mysqli_real_escape_string($conn,$_POST['weight']));
        $product -> setProductDimension(mysqli_real_escape_string($conn,$_POST['length']),mysqli_real_escape_string($conn,$_POST['breadth']),mysqli_real_escape_string($conn,$_POST['height']));   
        
        $weight = $product -> getProductWeight();
        $dimensions = $product -> getProductDimension();
        $length = $dimensions[0];
        $breadth = $dimensions[1];
        $height = $dimensions[2];
        $prod = ($_POST['product'] === 'newProduct') ? $_POST['newProduct'] : $_POST['product'];
        $sql = "insert into products(productName, length, breadth, height, weight) values('$prod','$length','$breadth','$height','$weight')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $_SESSION['msg'] = "Product Added!";
        }
    }
    header('Location: warehouseFront.php');
?>
