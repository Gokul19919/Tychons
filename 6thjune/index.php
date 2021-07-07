<html>
    <head>
                <style>
                
                    * {
                        box-sizing: border-box;
                    }
                    body
                    {
                        margin: 0;
                    }
                    .column 
                    {
                        float: left;
                        width: 33.33%;
                        padding: 20px;
                        text-align:center;
                    }
                    .submit
                    {
                        text-align:center;
                    }
                </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include"insert.php" ?>
        <?php




if(isset($_GET['edit']))
{

    // $select_query = new DB_con();
    $product_SKU = $_GET['edit'];
    $product_name = $_GET['product_name'];
    $product_description = $_GET['product_description'];
    $product_price = $_GET['product_price'];
    $product_quantity = $_GET['product_quantity'];
    $product_status = $_GET['product_status'];


// while($row1 = $update_query1){
//     $product_name        =$row1['product_name'];
//     $product_description =$row1['product_description'];
//     $product_SKU        =$row1['product_SKU'];
//     $product_status      =$row1['product_status'];
    
//     while($row2 = $update_query2){
//         $product_SKU        =$row2['product_SKU'];
//         $product_price       =$row2['product_price'];
//         $product_quantity    =$row2['product_quantity'];

//     }
// }
if(isset($_POST['update'])){
    $product_name        =$_POST['product_name'];
    $product_description =$_POST['product_description'];
    $product_code        =$_POST['product_SKU'];
    $product_price       =$_POST['product_price'];
    $product_quantity    =$_POST['product_quantity'];
    $product_status      =$_POST['product_status'];

/////////////////// FUNCTION CALL FOR UPDATE  \\\\\\\\\\\\\\\\\\\
$updatedata1 = new DB_con();
$updatedata2 = new DB_con();
$update_query1 = $updatedata1->update1($product_name, $product_description, $product_code, $product_status);// function call
$update_query2 = $updatedata2->update2($product_SKU, $product_price, $product_quantity);
}
// echo "<script>alert('Record has been Updated successfully');</script>";
// echo "<script>window.location.href='index.php'</script>";
}
?>
        <!----------------Form for Getting input----------------->
        <form action="" method="post" enctype="multipart/form-data">    
            <div class="row">

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="product_name" value="<?php echo isset($_GET['edit']) ? $product_name : ''; ?>">
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Code</label>
                            <input type="text" class="form-control" name="product_SKU" value="<?php echo isset($_GET['edit']) ? $product_SKU : ''; ?>">
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Description</label>
                            <input type="text" class="form-control" name="product_description" value="<?php echo isset($_GET['edit']) ? $product_description : ''; ?>">
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Product Price</label>
                            <input type="text" class="form-control" name="product_price" value="<?php echo isset($_GET['edit']) ? $product_price : ''; ?>">
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="product_status">Product Status</label>
                                <select name="product_status" id="">
                                <option value="<?php echo isset($_GET['edit']) ? $product_status : 'Disabled';?>"><?php echo isset($_GET['edit']) ? $product_status : 'Disabled';?></option>
                                <?php
                                if($product_status == 'Enabled')
                                {
                                    echo "<option value='Disabled'>Disabled</option>";
                                }elseif($product_status == 'Disabled')
                                {
                                    echo "<option value='Enabled'>Enabled</option>";
                                }
                                else{
                                    echo "<option value='Enabled'>Enabled</option>";
                                }
                                ?>
                                </select>
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Product Quantity</label>
                            <input type="text" class="form-control" name="product_quantity" value="<?php echo isset($_GET['edit']) ? $product_quantity : ''; ?>" >
                        </div>
                    </div>

            </div>
                    <div class="submit"  style="text-align:center">
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'add'; ?>" id="submit" value="<?php echo isset($_GET['edit']) ? 'Update' : 'Add'; ?>">
                        </div>
                    </div>
                    <br>
        </form>
        <!----------------Table to Display----------------->
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style='text-align:center' >Name</th>
                            <th style='text-align:center' >Code</th>
                            <th style='text-align:center'>Description</th>
                            <th style='text-align:center'>Status</th>
                            <th style='text-align:center'>Price</th>
                            <th style='text-align:center'>Quantity</th>
                            <th style='text-align:center'>Edit</th>
                            <th style='text-align:center'>Delete</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $deletedata=new DB_con();
                            $fetchdata=new DB_con();
                            //<--------------Fetch Function to Display data--------------->//
                            $sql=$fetchdata->fetchdata();
                            while ($row = mysqli_fetch_assoc($sql))
                            {
                                $product_name           = $row['product_name'];
                                $product_SKU           = $row['product_SKU'];
                                $product_description    = $row['product_description'];
                                $product_status       = $row['product_status'];
                                $product_price          = $row['product_price'];
                                $product_quantity       = $row['product_quantity'];                               
                                
                                echo"<tr>";

                                echo "<td style='text-align:center' >$product_name</td>";
                                echo "<td style='text-align:center'>$product_SKU</td>";
                                echo "<td style='text-align:center'>$product_description</td>";
                                echo "<td style='text-align:center'>$product_status</td>";
                                echo "<td style='text-align:center'>$product_price</td>";
                                echo "<td style='text-align:center'>$product_quantity</td>";
                                echo "<td style='text-align:center;'><a href='index.php?edit=$product_SKU&product_name=$product_name&product_description=$product_description&product_price=$product_price&product_quantity=$product_quantity&product_status=$product_status' class='btnRemoveAction'> Edit</a></td>";
                                echo "<td style='text-align:center;'><a href='index.php?remove&code={$product_SKU}' class='btnRemoveAction'><img src='icon-delete.png' alt='Remove Item' /></a></td>";
                                 echo"</tr>";
                            }                        
                    
                        ?>
                        
                    </tbody>
                </table>
            
    </body>
</html>

<?php
//<--------------Delete--------------->//
    if(isset($_GET["remove"])) 
    {
                if(isset($_GET['code']))
                {
                    $rid = $_GET['code'];
                    $delete_query =  $deletedata->delete($rid); 
                    //header("Location: index.php"); 
                }
            
        }
        
     
?>





     