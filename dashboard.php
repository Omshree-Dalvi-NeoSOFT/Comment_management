<?php 
 session_start();
 $sid=$_SESSION['sid'];
  // check session.
 if(empty($sid)){
   header("location:index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
            <!-- Including head tags and other scripting files. -->
<?php include('head.php')?>     
</head>
<body>
    <?php include('nav.php')?>
    <section class="mt-3"></section>
    <section class="container-fluid">

    <section class="row">
        <section class="col-md-3 ">
            <?php include('sidebar.php') ?>
        </section>
        
        <section class="col-md-9 ">
            <!-- open pages on get -->
           <?php 
            switch(@$_GET['con']){
                case 'comment':
                    include('comment.php');
                    break;
                case 'home':
                    include('post.php');
                    break;
                case 'changepass':
                    include('changepass.php');
                    break;
                case 'addpost':
                    include('addpost.php');
                    break;
                case 'view':
                    include('post.php');
                    break;
                default:
                    include('post.php');      
            }
           ?> 
        </section>
    </section>

    </section>
    
    <section class="container-fluid">
        <!-- include footer file, for page footer -->
        <?php include('footer.php')?>
    </section>
    
    <?php include('foot.php')?>
</body>
</html>