<?php
    //<------include database connection file------>//
    require_once'function.php';

    //<--------------Object creation--------------->//
    $insertdata=new DB_con();

    if(isset($_POST['add']))
    {
        //<--------------Posted Values--------------->//
        $product_name=$_POST['product_name'];
        $product_description=$_POST['product_description'];
        $product_SKU=$_POST['product_SKU'];
        $product_status=$_POST['product_status'];
        $product_price=$_POST['product_price'];
        $product_quantity=$_POST['product_quantity'];
        
        $id =1;
        $last = new DB_con();
        $lastrecquery = $last->lastrecord();
        if(mysqli_num_rows($lastrecquery)>0)
        {
            
            while($result=mysqli_fetch_assoc($lastrecquery))
            {
                $id = $result['id']; // starts from 2
            }
        }
        
        //<--------------Function Calling--------------->//
        
        
        $sql1=$insertdata->insert1($id,$product_name,$product_description,$product_SKU,$product_status);
        $sql2=$insertdata->insert2($id,$product_SKU,$product_price,$product_quantity);
      
            echo "<script>alert('Record inserted successfully');</script>";
            echo "<script>window.location.href='index.php'</script>";
    }
?>
