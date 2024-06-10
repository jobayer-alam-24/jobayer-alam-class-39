<?php
    include("serverconnection.php");
    $id = $_POST['id'];
    $query = 'DELETE FROM user_signup_info WHERE id = ' . $id;
    $del = mysqli_query($conn, $query);
    
    if($del){
        header("Location: datatable.php");
        exit();
    }else{
        echo "Couldn't DELETE Data!";
    }
?>