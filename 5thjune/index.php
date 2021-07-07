<?php include "db.php";  ?>
<?php include "functions.php";  ?>
<html>
    <head>
        <div class="head">
            <h1>PRODUCT CATALOG</h1>
        </div>
        <style>
            .head
            {
                text-align: center;
            }
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
                width: 20%;
                padding: 45px;
                text-align:center;
            }
            .submit
            {
                text-align:center;
            }
            td, th 
            {
                border: 1px solid black;
                text-align: center;
                padding: 8px;
            }

        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    </head>
    <body>   
        <?php
        
        if(isset($_POST["submit"]))
        {        
            $name           = $_POST['name'];
            $code           = $_POST['code'];
            $description    = $_POST['description'];
            $price          = $_POST['price'];
            $quantity       = $_POST['quantity'];
            

            if(code_exists($code))
                {
                    echo "<script>alert('Code already exists');</script>";
                }
            else
                {
                    $query = "INSERT INTO task( Name, Code , Description  ,Price ,Quantity) ";

                    $query .= "VALUES('{$name}','{$code}','{$description}', '{$price}','{$quantity}')";

                    $create_product = mysqli_query($connection, $query);

                    echo "<script>alert('Form has been submitted successfully');</script>";
                }
        }

        ?>
        <form action="" method="post" enctype="multipart/form-data">    
            <div class="row">

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="name" style="width: 200px;" >
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Code</label>
                            <input type="text" class="form-control" name="code" style="width: 200px;">
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Description</label>
                            <input type="text" class="form-control" name="description" style="width: 200px;">
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Price</label>
                            <input type="text" class="form-control" name="price" style="width: 200px;">
                        </div>
                    </div>

                    <div class="column" style="text-align:center">
                        <div class="form-group">
                            <label for="title">Quantity</label>
                            <input type="text" class="form-control" name="quantity" style="width: 200px;" >
                        </div>
                    </div>

            </div>
                    <div class="submit">
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Add Product">
                        </div>
                    </div>
        </form>
        <hr>        
           
        <div class="head">
            <h3>LIST OF AVAILABLE PRODUCTS</h3>
            <br>
        </div>

        <div class="product">
            <?php include "product.php";  ?>
        </div>


    </body>
</html>



<!-- <script>
$(document).ready(function(){
    $('#submit').on('click',function(){
        var code = $('#code').val();
        $.ajax({
            type:'POST',
            url:'product.php',
            dataType: "json",
            data:{code:code},
            success:function(data){
                if(data.status == 'ok'){
                    $('#Name').text(data.result.name);
                    $('#userEmail').text(data.result.email);
                    $('#userPhone').text(data.result.phone);
                    $('#userCreated').text(data.result.created);
                    $('.user-content').slideDown();
                }else{
                    $('.user-content').slideUp();
                    alert("User not found...");
                } 
            }
        });
    });
});
</script> -->