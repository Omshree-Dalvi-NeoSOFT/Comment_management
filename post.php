<?php 
include("connection.php");
?>

<?php 
$fetch=mysqli_query($conn,"SELECT * FROM post ORDER BY created_at DESC;");
if(mysqli_num_rows($fetch)>0){
  while($arr=mysqli_fetch_assoc($fetch)){
    $uid=$arr['uid'];
    $pid=$arr['pid'];
    $funame=mysqli_query($conn,"SELECT * FROM users WHERE id=$uid");
    $uarr=mysqli_fetch_assoc($funame); 
    ?>
    <div class="card mt-2">
      <h5 class="card-header">Featured Post By : <?php echo $uarr['username']?> <i class="ml-5">Posted at : <?php echo $uarr['created_at']?></i></h5>
      <div class="card-body">
        <h5 class="card-title"><?php echo $arr['title']?></h5>
        <img src="<?php echo $arr['image']?>" class="card-img-mid" alt="post" height="210px" width="200px">
        <p class="card-text"><?php echo $arr['post']?></p>
        <a class="btn btn-success" href="?con=comment&pid=<?= $pid?>&uid=<?= $uid?>"> Comment</a>
        <?php
          $f=mysqli_query($conn,"SELECT * FROM comment WHERE pid=$pid;");
          if(mysqli_num_rows($f)>0){
            while($a=mysqli_fetch_assoc($f)){
              $uid=$a['uid'];
              $op=mysqli_query($conn,"SELECT * FROM users WHERE id=$uid");
              $opf=mysqli_fetch_assoc($op);
              ?>
              <div class="card mt-2">
                <div class="card-header">
                    Quote
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p><?= $a['comment'];?></p>
                    <footer class="blockquote-footer">Comment by : <?= $opf['username']?></footer>
                    </blockquote>
                </div>
            </div>
              <?php
            }
          }
        ?>
            <div id="comm"></div>
      </div>
    </div>
    <?php
  }
}
?>