<?php
session_start();
include('connect.php');

if(isset($_POST['goal_title'])
&& isset($_POST['description'])){
      $title = $_POST['goal_title'];
      $goaldescription = $_POST['description'];
      $query = "INSERT INTO goal(goal_title , description , user_id) VALUES('$title' , '$goaldescription' , '$user_id')";

      if(mysqli_query($conn , $query))
      {
            
            $msg = "Data inserted";
            header('Location:../form.php?msg='.$msg);
      }else{
            
            $msg = "some error occured : ".mysqli_error($conn);
            header('Location:../form.php?msg='.$msg);

      }

}else
{
      $msg = "all fields are required";
}

?>