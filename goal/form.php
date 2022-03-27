<?php
session_start();
 if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
   header('Location:login.php');
 }
 $id = $_SESSION['user_id']; 
 $user_id = $_SESSION['user_id'];
 include('db/connect.php');
 $query = "SELECT * FROM goal WHERE id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

$categoryQuery="SELECT * FROM goal WHERE user_id = '$user_id'";
$categoryResult=mysqli_query($conn, $categoryQuery);


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
                    <form method="post" action="db/form.php">
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"><b>Goal Title</b></label>
                   <input type="text" name="goal_title" class="form-control" id="exampleFormControlInput1" placeholder="goal">
                    </div>
                        
                    </div>  
                    <br>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Description</b></label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:navy;">Submit</button>
                </form>
                <?php include('include/message.php'); ?>
                <div class="row justify-content-md-center">
                    <?php
                    if(mysqli_num_rows($categoryResult)==0){
                      echo "<h3>No category found</h3>";
                    }
                    else { ?>
                    <table class="table">
                        <thead>
                            <th>Title</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                         <?php while($row=mysqli_fetch_assoc($categoryResult)){ ?>
                            <tr>
                                <td><?php echo $row['goal_title'] ?></td>
                                <td> <a href ="#" onclick="deleteConfirmation(<?php echo $row['id'];?>);"><i class="fas fa-trash-alt" style="color:purple"></i></a> ||
                                <a href="update.php?id=<?php echo $row['id'];?>" ><i class="fas fa-edit" style="color:purple" ></i></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <?php  } ?>

                </div>

               

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
    <script src="js/bootbox.min.js"></script>
    <script>
        function deleteConfirmation(id){
            bootbox.confirm({
    message: "Are you sure?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result){
            window.location='db/delete.php?id='+id;
        }
    }
});

        }
        </script>
   
   
</body>

</html>