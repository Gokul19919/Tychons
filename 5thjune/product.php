<?php
if(!empty($_GET["action"])) 
{
    switch($_GET["action"]) 
    {
        
        case "remove":
            if(isset($_GET['code']))
                {
                    $the_product_id = $_GET['code'];
                    $query = "DELETE FROM task WHERE code = '{$the_product_id}' "; 
                    $delete_query = mysqli_query($connection, $query);
                    //header("Location: index.php");
                    break;
        	
                }
    }
}
?>
    
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style='text-align:center' >Name</th>
                <th style='text-align:center' >Code</th>
                <th style='text-align:center'>Description</th>
                <th style='text-align:center'>Price</th>
                <th style='text-align:center'>Quantity</th>
                <th style='text-align:center'>Delete</th>
            </tr>
        </thead>


        <tbody>
        <?php 
        // if(!empty($_POST["code"])) 
        // {
        //$data = array();        
        $query = "SELECT * FROM task";
        $select_product = mysqli_query($connection, $query);

        // if($query->mysqli_num_rows > 0)
        // {
        //     $userData = $query->mysqli_fetch_assoc();
        //     $data['status'] = 'ok';
        //     $data['result'] = $userData;
        // }else
        // {
        //     $data['status'] = 'err';
        //     $data['result'] = '';
        // }
        
        
        //echo json_encode($data);
    //}
        while ($row = mysqli_fetch_assoc($select_product))
            {
               
                $name           = $row['Name'];
                $code           = $row['Code'];
                $description    = $row['Description'];
                $price          = $row['Price'];
                $quantity       = $row['Quantity'];
                
                
                echo"<tr>";

                echo "<td style='text-align:center' >$name</td>";
                echo "<td style='text-align:center'>$code</td>";
                echo "<td style='text-align:center'>$description</td>";
                echo "<td style='text-align:center'>$price</td>";
                echo "<td style='text-align:center'>$quantity</td>";
                echo "<td style='text-align:center;'><a href='index.php?action=remove&code={$code}' class='btnRemoveAction'><img src='icon-delete.png' alt='Remove Item' /></a></td>";
                
                echo"</tr>";
            }
           
        
        ?>
        
    </tbody>
    </table>
    
