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
            if(isset($_POST['find'])){
                $par = $_POST['findProduct'];
                $sql = ($par === "all") ? "select * from products" : "select * from products where productName='$par'";
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
            }
        ?>
        <table>
        <form action = "getProduct.php"> 
            <button class="back"> 
                Back
            </button> 
        </form>
    </body>
</html>
