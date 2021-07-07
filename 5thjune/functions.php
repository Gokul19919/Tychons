<?php
function code_exists($code)
{

    global $connection;

    $query = "SELECT Code FROM task WHERE Code = '$code'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {
        return false;
    }
}

function confirmQuery($result) {
    global $connection;
    if(!$result ) { 
          die("QUERY FAILED ." . mysqli_error($connection)); 
      }
}
?>