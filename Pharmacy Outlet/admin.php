<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKOPEDEI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="images/logo_apotek.png" alt="logo" width=150px height= 150px>
        </div>
        <div class="pharmacy">
            <h1>CVJ</h1>
            <h3>PHARMACY</h3>
        </div>
        <div class="cart">
            <a href="index.php">
            <img src="images/log_out.png" alt="" width=110px height= 110px id= "logo" style="margin: 20px;">
            </a>
        </div>
    </div>
    <?php 
    require 'connect.php';

    $sql = 'SELECT * FROM product';
    $sql1 = 'SELECT * FROM login';
    $sql2 = 'SELECT * FROM history GROUP BY product_name, date';
    $result = mysqli_query($con, $sql);
    $result1 = mysqli_query($con, $sql1);
    $result2 = mysqli_query($con, $sql2);
    ?>
    <div class="table_columns">
        <div>
            <table id="t01">
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Action</th>
            </tr>
                <?php while($product = mysqli_fetch_object($result)) { ?> 
                <tr>
                    <td> <?php echo $product->product_name; ?> </td>
                    <td> Rp.<?php echo $product->product_price; ?> </td>
                    <td>
                        <a href ="edit_product.php?id=<?php echo $product->id;?>">Edit</a> |
                        <a href ="delete_admin.php?id=<?php echo $product->id;?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <a href="form_create_product.php">Create</a>
        </div>            
        <div>
            <table id="t01">
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
                <?php while($user = mysqli_fetch_object($result1)) { ?> 
                <tr>
                    <td> <?php echo $user-> username; ?> </td>
                    <td> <?php echo $user-> password; ?> </td>
                    <td>
                        <a href ="edit_user.php?user=<?php echo $user->username;?>">Edit</a> |
                        <a href ="delete_user.php?user=<?php echo $user->username;?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <a href="form_create_user.php">Create</a>
        </div>
        <div>
            <table id="t01">
            <tr>
                <th>Username</th>
                <th>Product</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
                <?php while($product = mysqli_fetch_object($result2)) { ?> 
                <tr>
                    <td> <?php echo $product->username; ?></td>
                    <td> <?php echo $product->product_name; ?> </td>
                    <td> <?php echo $product->date; ?></td>
                    <td> <?php echo $product->status; ?> </td>
                    <td>
                        <?php 
                            if ($product->status == 'selesai') { ?>
                                <p>Finished</p>
                        <?php }
                            else { ?>
                                <form action="edit_status.php" method="post">
                                    <input type="hidden" name='product' value='<?php echo $product->product_name;?>'>
                                    <input type="submit" name='submit' value='Move' class='form-table'>
                                </form>
                        <?php   } ?>
                        
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
</body>
</html>