<?php
    class Project{
        function __construct()
            {
                $this->conn=mysqli_connect("localhost","root","","comment_management");
            }
        function addnew($id,$title,$temp,$fn,$post){
            $uid=$id;
            if(preg_match("/^[a-zA-Z0-9\-\_ ]{0,50}+$/",$title)){
                $ext=pathinfo($fn,PATHINFO_EXTENSION);
                $fname=rand().".$ext";
                $dest = "post/$fname";
                if(mysqli_query($this->conn,"INSERT INTO post(title,post,image,uid) VALUE('$title','$post','$dest',$uid);")){
                    if(move_uploaded_file($temp,"post/$fname")){
                        return '<div class="alert alert-success" role="alert">Post Added ... !</div>';
                    }
                    else{
                        return '<div class="alert alert-danger" role="alert">uploading error !</div>';
                    }
                }
                else{
                    return '<div class="alert alert-danger" role="alert">Already Registerd ! try something different !</div>';
                }
            }
            else{
                return '<div class="alert alert-danger" role="alert">
                Title is incorrect ! title must be atleast 1 and less then 50 characters !
                </div>';
            }
        }
    }
?>