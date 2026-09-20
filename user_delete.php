<?php
session_start();
error_reporting(0);
$data = new mysqli("localhost", "root", "", "studentproject");
if($_GET['student_id'])
    {
        $id=$_GET['student_id'];
        $sql="DELETE FROM `users` WHERE user_id='$id'";
        $result=$data->query($sql);
        if( $result)
            {
                //echo "record deleted";
                header("location:select_user.php");
            }
    }


?>