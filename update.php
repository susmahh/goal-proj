<?php
if(!isset($_GET['id'])){
    die("YOu can not edit");
}
$cid  = $_GET['id'];
session_start();
 if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
   header('Location:login.php');
 }
 $id = $_SESSION['user_id']; 
 include('db/connect.php');
 $query = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

$categoryQuery="SELECT * FROM goal WHERE id='$cid'";
$categoryResult=mysqli_query($conn, $categoryQuery);
if(mysqli_num_rows($categoryResult)==0){
    die("no record found with this id");
}else{
    $row=mysqli_fetch_assoc($categoryResult);
}

?>

<html>

<head>
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                    <div class="input-group">
                    <form method="post" action="db/update.php">
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Goal Title</label>
                   <input type="text" name="goal_title" value="<?php echo $row['goal_title'];?>" class="form-control" id="exampleFormControlInput1" placeholder="goal">
                    </div>
                        
                    </div>  
                    <br>
                   
                    <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                     <textarea class="form-control" type="text"     name="description"><?php echo $row['description']; ?></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $cid; ?>">
                    <button name="goal" type="submit" class="btn btn-primary" style="background-color:navy;">Submit</button>
                </form>
                <?php include('include/message.php'); ?>

                
            

                </div>
            </div>
        </div>
    </div>

    <script
	src="https://code.jquery.com/jquery-3.6.0.min.js"
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
	  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a74baea4b2.js" crossorigin="anonymous"></script>
    
   
   
</body>

</html>