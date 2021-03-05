<!DOCTYPE html>
<html>
    <head>
        <title>
            Warehouse Management
        </title>
        <script src="warehouse.js"></script>
        <link rel="stylesheet" href="warehouse.css">
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="warehouseFront.php">Home</a>
            <a href="getProduct.php">Product List</a>
        </div>
        <div class = "main">
            <form action = "warehouse.php" method = "POST">
                <div class="title">
                    <h1>Enter Product Details</h1> 
                </div>
                <?php
                    session_start();
                    if(!empty($_SESSION['msg'])){
                        echo '<div class = "message">
                            <h2>'
                                .$_SESSION['msg'] .'
                            </h2>
                        </div>';
                        unset($_SESSION['msg']);
                        echo '<script> 
                            setTimeout(()=> {
                                document.getElementsByClassName("message")[0].style.display = "none";
                            },3000);
                        </script>';
                    }
                ?>
           
                <div class = "products">
                    <h2><label name = "selectProducts">Select Product: </label></h2>
                    <select name = "product" id = "productSelect" onchange="showProduct()">
                    <option value = "none" disabled>Select</option>
                    <?php
                        require 'connection.php';
                        $sql = "select distinct(productName) from products";
                        $result=mysqli_query($conn,$sql);
                        while($results=mysqli_fetch_array($result)){
                            echo '<option value =' . $results["productName"] .'>' . $results["productName"] . '</option>';
                        }
                    ?>
                        <option value = "newProduct">New Product</option>
                    </select>
                </div>
                <div class = "newProduct">
                    <h2><label name = "new-product">Enter New Product: </label></h2>
                    <input type = "text" class = "productInput" name= "newProduct" placeholder = "Enter new Product" />
                </div>
                <div class = "weight">
                    <h2><label name = "weight">Enter Weight: </label></h2>
                    <input type = "number" name = "weight" required placeholder = "In Kg" />
                </div>
                <div class = "dimensions">
                    <h2><label name = "dimensions">Enter Dimensions (length x breadth x height): </label></h2>
                    <div class = "dimension">
                        <input type="number" name = "length" required placeholder = "In cm"/>
                        <span>X</span>
                        <input type="number" name = "breadth" required placeholder = "In cm"/>
                        <span>X</span>
                        <input type="number" name = "height" required placeholder = "In cm"/>
                    </div>
                </div>
                <div class = "submit">
                    <button name = "submit" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>