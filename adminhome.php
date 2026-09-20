<?php
session_start();
if(!isset( $_SESSION['email']))
    {
        header("location:login_form.php");
    }
    elseif($_SESSION['role']=='student' OR $_SESSION['role']=='teacher')
        {
            header("location:login_form.php");
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="admin.css" >    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <style>
     #use_table
{
    font-size: 20px;
}

    </style>
</head>
<body>
   <?php 
   include'admin_aside.php';
   ?>
<div class="content">
    <h1>Welcome to Admin Dashboard</h1>

</div>
</body>
</html>