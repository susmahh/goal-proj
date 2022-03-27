<?php
        if(!isset($_POST['goal_title'])){
    die('cannot edit the record');
}else{
    $c=$_POST['goal_title'];
    $i=$_POST['description'];
    $id=$_POST['id'];
    include('connect.php');
    $query="UPDATE goal SET goal_title='$c',description='$i' WHERE id='$id'";
    
    if(mysqli_query($conn , $query)){
        header('location:../form.php?msg=succesfully updated');
    }else{
        header('location:../form.php?errmsg='.mysqli_error($conn));
    }
}
?>

