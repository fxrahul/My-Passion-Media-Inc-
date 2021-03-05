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
            <a href="warehouseFront.php">Add Product</a>
        </div>
        <div class = "products">
            <form action = "getProductByName.php" method = "POST">
                <h2><label name = "selectProducts">Find by Product: </label></h2>
                <select name = "findProduct" id = "productSelect">
                    <option value = "none" disabled>Select</option>
                    <option value = "all">All Products</option>
                    <?php
                        require 'connection.php';
                        $sql = "select distinct(productName) from products";
                        $result=mysqli_query($conn,$sql);
                        while($results=mysqli_fetch_array($result)){
                            echo '<option value =' . $results["productName"] .'>' . $results["productName"] . '</option>';
                        }
                    ?>
                </select>
                <div class = "submit">
                    <button name ="find" type="submit">Find</button>
                </div>
            </form>
        </div>
        <table class= "productTable">
            <tr>
                <th>
                    No.
                </th>
                <th>
                    Product Name
                </th>
                <th>
                    Weight
                </th>
                <th>
                    Dimensions
                </th>
            </tr>
            <?php
                require 'connection.php';
                $sql = "select * from products";
                $result=mysqli_query($conn,$sql);
                $row = 1;
                while($results=mysqli_fetch_array($result)){
                    echo '<tr>'
                    .'<td>' . $row . '</td>'
                    .'<td>' . $results['productName'] . '</td>'
                    .'<td>' . $results['weight'] . "Kg" .'</td>'
                    .'<td>' . $results['length'] . "cm" . ' x ' . $results['breadth'] . "cm" . ' x ' . $results['height'] . "cm" . '</td>'
                    .'</tr>';
                    $row++;
                }
            ?>
        <table>
    </body>
</html>