<?php 
include("connection.php");
?>

<?php 
$fetch=mysqli_query($conn,"SELECT * FROM post ORDER BY created_at DESC;");
if(mysqli_num_rows($fetch)>0){
  while($arr=mysqli_fetch_assoc($fetch)){
    $uid=$arr['uid'];
    $funame=mysqli_query($conn,"SELECT username,created_at FROM users WHERE id=$uid");
    $uarr=mysqli_fetch_assoc($funame); 
    ?>
    <div class="card mt-2">
      <h5 class="card-header">Featured Post By : <?php echo $uarr['username']?> <i class="ml-5">Posted at : <?php echo $uarr['created_at']?></i></h5>
      <div class="card-body">
        <h5 class="card-title"><?php echo $arr['title']?></h5>
        <img src="<?php echo $arr['image']?>" class="card-img-mid" alt="post" height="210px" width="200px">
        <p class="card-text"><?php echo $arr['post']?></p>
        <button class="btn btn-primary p-2 mt-4" type="submit" name="sub" id="sub">Add Comment</button>
            <div id="comm"></div>
      </div>
    </div>
    <?php
  }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#sub").click(function(){
      alert("add comment");
    })
  })
</script>