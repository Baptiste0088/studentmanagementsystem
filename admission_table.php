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
    $data=new mysqli("localhost","root","","studentproject");

$sql = "SELECT * FROM admission_letter ORDER BY submitted_at ASC";
$result = $data->query($sql);

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
     body{
            font-family: Arial, sans-serif;
            background:#f5f5f5;
            margin:20px;
        }

        h2{
            text-align:center;
            color:#333;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:#fff;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        th{
            background:#0d6efd;
            color:white;
            padding:12px;
        }

        td{
            padding:10px;
            border:1px solid #ddd;
            text-align:center;
        }

        tr:nth-child(even){
            background:#f9f9f9;
        }

        tr:hover{
            background:#f1f1f1;
        }

        a{
            color:#0d6efd;
            text-decoration:none;
            font-weight:bold;
        }

        .pending{
            color:orange;
            font-weight:bold;
        }

        .approved{
            color:green;
            font-weight:bold;
        }

        .rejected{
            color:red;
            font-weight:bold;
        }
        .view
        {
            background-color:blue;
            border-radius:3px;
            color: white;
            font-size:25px;
            width: 30px;
        }
    </style>
</head>
<body>
   <?php 
   include'admin_aside.php';
   ?>
<div class="content">
    <h2>Admission Letter Requests</h2>
<table>

<tr>
    <th>NO</th>
    <th>SDMS Code</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Phone</th>
    <th>Trade</th>
    <th>Academic Year</th>
    <th>Term</th>
    <th>Level</th>
    <th>Result Slip</th>
    <th>Purpose</th>
    <th>Comments</th>
    <th>Status</th>
    <th>Date Submitted</th>
    <th>FeedBack</th>
    <th>ACTION</th>
</tr>

<?php

if($result->num_rows > 0){

    $no = 1;

    while($row = $result->fetch_assoc()){

        echo "<tr>";

        echo "<td>".$no++."</td>";
        echo "<td>".$row['student_sdms_code']."</td>";
        echo "<td>".$row['full_name']."</td>";
        echo "<td>".$row['email_address']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['phone_number']."</td>";
        echo "<td>".$row['trade_program']."</td>";
        echo "<td>".$row['academic_year']."</td>";
        echo "<td>".$row['term']."</td>";
        echo "<td>".$row['requested_level']."</td>";

        if(!empty($row['result_slip'])){
            echo "<td><a href='".$row['result_slip']."' target='_blank'>View File</a></td>";
        }else{
            echo "<td>No File</td>";
        }

        echo "<td>".$row['purpose_of_admission_letter']."</td>";
        echo "<td>".$row['additional_comments']."</td>";

        $status = strtolower($row['request_status']);

        echo "<td class='$status'>".$row['request_status']."</td>";

        echo "<td>".$row['submitted_at']."</td>";
        echo "<td>
        <a class='view' href='reply.php?id=".$row['id']."'>
             Reply
        </a>
      </td>";
       echo '<td>
        <a class="btn btn-danger" href="admission_delete.php?id=' . $row['id'] . '">
            Delete
        </a>
      </td>';
      
      

        echo "</tr>";

    }

}else{

    echo "<tr>
            <td colspan='15'>No admission requests found.</td>
          </tr>";

}

$data->close();

?>

</table>


</div>
</body>
</html>