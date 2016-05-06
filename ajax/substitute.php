<?php
    include 'connect_bd.php';
    $new_value=$_REQUEST['new_value'];
    $id=$_REQUEST['id'];
    $column=$_REQUEST['column'];
    $query="UPDATE user_information SET $column ='$new_value' WHERE id = '$id' ";
    $result=mysql_query($query);
    if($result==true)
        {
            echo "Good!";
        }
     else
        {
            echo "Fail!<br>".mysql_error();
        }
    

?>

