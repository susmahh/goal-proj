<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query="DELETE FROM goal WHERE id ='$id'";
    include('connect.php');
    if(mysqli_query($conn,$query)){
        header("Location:../form.php?msg=successful delete");
    }else{
        header("Location:../form.php?errmg=".mysqli_error($conn));
    }
}
