<?php 
include("connection.php");
?>

<?php 
$fetch=mysqli_query($conn,"SELECT * FROM post ORDER BY pid DESC;");
if(mysqli_num_rows($fetch)>0){
  while($arr=mysqli_fetch_assoc($fetch)){
    ?>
    <div class="card mt-2">
      <h5 class="card-header">Featured</h5>
      <div class="card-body">
        <h5 class="card-title"><?php echo $arr['title']?></h5>
        <img src="<?php echo $arr['image']?>" class="card-img-top" alt="post" height="210px">
        <p class="card-text"><?php echo $arr['post']?></p>
        <a href="#" class="btn btn-primary">Add Comment</a>
            <?php include("comment.php");?>
      </div>
    </div>
    <?php
  }
}
?>
