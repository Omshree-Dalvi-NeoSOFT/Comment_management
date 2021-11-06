<?php
$id=$_SESSION['sid'];
$user=$_SESSION['user'];
?>

<form method="post">
<div class="card mt-2">
    <div class="card-header">
        Quote
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p><textarea id="post" name="comment" class="form-control mt-4" ></textarea></p>
        <footer class="blockquote-footer"><?= $user?></footer>
        </blockquote>
        <button class="btn btn-success p-2 mt-4" type="submit" name="addcomment" id="sub">Submit Comment</button>
    </div>
</div>
</form>
