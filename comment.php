<?php 
error_reporting(0);
// check session
if(empty($sid)){
    header("location:index.php");
  }
// include connection and class file
include("connection.php");
include("class.php");
// session variables.
$id=$_SESSION['sid'];
$user=$_SESSION['user'];
$ob= new Project();     // class object

// logic to post comment
if(isset($_POST['sub'])){
    if(!empty($_POST['comment'])){
        $pid=@$_GET['pid'];     // get post id from url
        $uid=@$_GET['uid'];     // get user id from url
        $comment=$_POST['comment'];
        // check wether user post comment on self post.
        if($id==$uid){
            echo '<div class="alert alert-danger" role="alert">
                User can not comment on own post ..
                </div>';
        }
        else{
            // call comment function.
            $msg=$ob->comment($pid,$id,$comment);
            echo $msg;
        }
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
                Empty Entries!
                </div>';
    }
    
}

?>
<!-- comment form -->
<form method="POST">
    <div class="card mt-2">
        <div class="card-header">
            Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <p><div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Your Comment</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="comment">
                </div></p>
                <button class="btn btn-success p-2 mt-4" type="submit" name="sub" id="sub">Submit Comment</button>
            </blockquote>
        </div>
    </div>
</form>