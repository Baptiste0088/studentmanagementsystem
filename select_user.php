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

        $conn = new mysqli("localhost","root","","studentproject");

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$sql = "SELECT user_id, email, password,role, status, created_at
        FROM users
        ORDER BY user_id ASC";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin:0;
            padding:0;
        }

body{
    font-family:Arial, Helvetica, sans-serif;
    background:#f4f6f9;
    margin:0;
    padding:20px;
}

.container{
    width:90%;
    margin:auto;
}

h2{
    text-align:center;
    color:#003366;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    box-shadow:0 3px 10px rgba(0,0,0,.2);
}

th{
    background:#003366;
    color:white;
    padding:12px;
    text-align:center;
}

td{
    padding:10px;
    border:1px solid #ddd;
    text-align:center;
}

tr:nth-child(even){
    background:#f2f2f2;
}

tr:hover{
    background:#e8f4ff;
}

.active{
    background:green;
    color:white;
    padding:5px 12px;
    border-radius:4px;
}

.inactive{
    background:red;
    color:white;
    padding:5px 12px;
    border-radius:4px;
}

.no-data{
    text-align:center;
    color:red;
    font-size:18px;
    margin-top:20px;
}
  #use_table
{
    font-size: 20px;
}
.user_table
{
    width: 20%;
}


</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="admin.css" >    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
</head>
<body>
   <?php 
   include'admin_aside.php';
   ?>
   <center>
<div class="content">
 <table><tr><td><h2>Registered Users</h2> </td><td><a class="btn btn-primary" href="user_insert.php">Add New User</a></td></tr>

<?php

if($result->num_rows>0){

?>

<table class="user_table">

<tr class="th_id">
    <th>ID</th>
    <th>Email</th>
    <th>password</th>
    <th>Role</th>
    <th>Status</th>
    <th>Created At</th>
    <th colspan="2">Modification</th>
</tr>

<?php

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['user_id']; ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>
<td><?php echo htmlspecialchars($row['password']); ?></td>

<td><?php echo ucfirst($row['role']); ?></td>

<td>

<?php

if($row['status']=="active"){
    echo "<span class='active'>Active</span>";
}else{
    echo "<span class='inactive'>Inactive</span>";
}

?>

</td>

<td><?php echo $row['created_at']; ?></td>
<td><?php echo "<a class='btn btn-danger' onclick=\" javascript:return confirm('Are you sure to delete this'); \"href='user_delete.php?student_id={$row['user_id']}'>Delete</a>"; ?></td> 
<td><?php echo "<a class='btn btn-success' onclick=\" javascript:return confirm('Are you sure to change this'); \"href='user_update.php?student_id={$row['user_id']}'>Update</a>"; ?></td>

</tr>

<?php

}

?>

</table>

<?php

}else{

    echo "<div class='no-data'>No users found.</div>";

}

$conn->close();

?>

</div>
</center>
</body>
</html>



