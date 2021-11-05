<?php 
// session values to get email and user name
$id=$_SESSION['sid'];
$user=$_SESSION['user'];
include("connection.php");
$fe=mysqli_query($conn,"SELECT * FROM users WHERE id=$id;");
$arr=mysqli_fetch_assoc($fe);
$name=$arr['ename'];
$age=$arr['age'];
$gender=$arr['gender'];
$imgpath=$arr['profileimg'];
?>

<div class="card" style="width: 18rem;">
<!-- print image -->
  <img src="<?php echo $imgpath; ?>" height="250px" width="100%" class="card-img-top" alt="Profile Photo">
  <div class="card-body">
    <!-- print username -->
    <h5 class="card-title"><?php echo $user;?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush sidebar">
    <!-- print details -->
    <a href="?con=addpost"><li class="list-group-item" role="button">Add Post</li></a>
    <a href="?con=view"><li class="list-group-item" role="button">View Post</li></a>
  </ul>
</div>