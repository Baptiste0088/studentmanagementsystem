<?php
session_start();
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql="DELETE FROM `admission_letter` WHERE id='$id'";
        $result=$conn->query($sql);

        if($result==true)
            {
                $message="an applicant removed successfull";
               $_SESSION['message']=$message;
               header("location:admission_table.php");

            }
    }



?>