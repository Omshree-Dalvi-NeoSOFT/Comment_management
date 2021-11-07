<?php 
// check session
if(empty($sid)){
  header("location:index.php");
}
// connection file and classes file.
include("connection.php");
include("class.php");
// session
$id=$_SESSION['sid'];
$user=$_SESSION['user'];
// class object as $ob
$ob= new Project();
if(isset($_POST['sub'])){
  // check for empty
    if(!empty($_POST['title']) || !empty($_POST['att']) || !empty($_POST['post'])){
        $title=$_POST['title'];
        $temp=$_FILES['att']['tmp_name'];//read tmp name
        $fn=$_FILES['att']['name'];//orginal name
        $post=$_POST['post'];
        // adding post to Database, call function.
        $msg=$ob->addnew($id,$title,$temp,$fn,$post);
        echo $msg;
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
                Empty Entries!
                </div>';
    }
    
}

?>

<!-- Post form. -->
<form method="post" enctype="multipart/form-data">
<div class="card">
  <h5 class="card-header">Featured Post : <?= $user?></h5>
  <div class="card-body">
    <h5 class="card-title"><input type="text" id="title" name="title" class="form-control" placeholder=" Add Title ...."></h5>
    <label for="validationServer01" class="form-label">Upload Image</label>
    <input type="file"  name="att"  class="form-control" id="validationServer01">
    <textarea id="post" name="post" class="form-control mt-4" placeholder="Post Description"></textarea>
    <button class="btn btn-success p-2 mt-4" type="submit" name="sub" id="sub">Submit Post</button>
  </div>
</div>
</form>
