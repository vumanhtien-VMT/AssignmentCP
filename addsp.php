<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<div class="content">
        <h1>Adding Product Form</h1>
        <?php 
        require("connect.php");   
        if(isset($_POST["submit"]))
            {
                $name = $_POST["proname"];
                $price = $_POST["price"];
                $descrip = $_POST["descrip"];
                if ($name == ""||$price == ""|| $descrip == "") 
                    {
                        echo "Product information should not be blank!!";
                    }
                else
                    {
                        $sql = "select * from product where proname='$name'";
                        $query = pg_query($conn, $sql);
                        if(pg_num_rows($query)>0)
                        {
                            echo "Product is already available!!";
                        }
                        else
                        {
                            $sql = "INSERT INTO product(proname, price, descrip) VALUES ('$name','$price','$descrip')";
                            pg_query($conn,$sql);
                            echo  "Sign Up successful!!";
                        }
                    }
            }
			 ?>
        <form action="add.php" method="POST">
            <input type="text" width="300" height="100" name="proname" placeholder="Name"> <br>
            <input type="text" width="300" height="100" name="price" placeholder="Price"> <br>
            <input type="text" width="300" height="100" name="descrip" placeholder="Description"> <br>
            <button type="submit" value="Add" name="submit">Add</button>
        </form>
</body>
</html>