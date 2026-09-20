<?php
session_start();

require_once __DIR__ . '/database.php';
$conn = database_connection();

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

// Check if student is logged in
if(!isset($_SESSION['email'])){
    header("Location: login_form.php");
    exit();
}

$sdms= $_SESSION['email'];

// Retrieve application and reply
$sql = "SELECT
            a.id,
            a.student_sdms_code,
            a.full_name,
            a.email_address,
            a.trade_program,
            a.academic_year,
            a.term,
            a.requested_level,
            a.request_status,

            r.reply_status,
            r.reply_message,
            r.admission_letter,
            r.responded_by,
            r.response_date

        FROM admission_letter a

        LEFT JOIN request_reply r
        ON a.id = r.admission_letter_id

        WHERE a.email_address=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$sdms);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>

<title>Student Dashboard</title>

<style>

body{
    font-family:Arial,Helvetica,sans-serif;
    background:#f4f6f9;
    margin:0;
}

.container{
    width:80%;
    margin:30px auto;
}

.card{

    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,.2);

}

h2{

    text-align:center;
    color:#003366;

}

table{

    width:100%;
    border-collapse:collapse;
    margin-top:20px;

}

table td{

    padding:12px;
    border-bottom:1px solid #ddd;

}

.label{

    font-weight:bold;
    width:250px;

}

.status{

    padding:8px 15px;
    color:#fff;
    border-radius:5px;
    font-weight:bold;

}

.pending{

    background:orange;

}

.approved{

    background:green;

}

.rejected{

    background:red;

}

.download{

    display:inline-block;
    background:#007BFF;
    color:#fff;
    padding:10px 18px;
    text-decoration:none;
    border-radius:5px;

}

.download:hover{

    background:#0056b3;

}

.message{

    background:#f8f9fa;
    padding:15px;
    border-left:5px solid #007BFF;

}
.reply-status{
    padding:8px 15px;
    border-radius:5px;
    color:#fff;
    font-weight:bold;
    display:inline-block;
}

.waiting{
    background-color:orange;
}

.approved{
    background-color:green;
}

.rejected{
    background-color:red;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h2>Admission Application Status</h2>

<table>

<tr>
<td class="label">SDMS Code</td>
<td><?php if (isset($row['student_sdms_code'])) {echo $row['student_sdms_code']; }?></td>
</tr>
<tr>
<td class="label">Email</td>
<td><?php if(isset($row['email_address'])){ echo $row['email_address']; }?></td>
</tr>

<tr>
<td class="label">Full Name</td>
<td><?php if(isset($row['full_name'])){ echo $row['full_name']; }?></td>
</tr>

<tr>
<td class="label">Trade</td>
<td><?php if(isset($row['trade_program'])){ echo $row['trade_program']; }?></td>
</tr>

<tr>
<td class="label">Academic Year</td>
<td><?php if(isset($row['academic_year'])){ echo $row['academic_year']; }?> </td>
</tr>

<tr>
<td class="label">Term</td>
<td><?php if(isset($row['term'])){ echo $row['term']; }?> </td>
</tr>

<tr>
<td class="label">Level</td>
<td><?php if(isset($row['requested_level'])){ echo $row['requested_level']; }?></td>
</tr>

<tr>
<td class="label">Application Status</td>

<td>

<?php

$status=$row['request_status'];

if($status=="Approved")
{
    echo "<span class='status approved'>$status</span>";
}
elseif($status=="Rejected")
{
    echo "<span class='status rejected'>$status</span>";
}
else
{
    echo "<span class='status pending'>$status</span>";
}

?>

</td>

</tr>

<tr>

<td class="label">Reply Status</td>

<td>

<?php

if (empty($row['reply_status'])) {
    echo "<span class='reply-status waiting'>Waiting for response</span>";
} else {

    if ($row['reply_status'] == "Approved") {
        echo "<span class='reply-status approved'>".$row['reply_status']."</span>";
    } elseif ($row['reply_status'] == "Rejected") {
        echo "<span class='reply-status rejected'>".$row['reply_status']."</span>";
    } else {
        echo "<span class='reply-status waiting'>".$row['reply_status']."</span>";
    }

}

?>

</td>

</tr>

<tr>

<td class="label">Reply Message</td>

<td>

<div class="message">

<?php

if(empty($row['reply_message']))
{

echo "No message yet.";

}
else
{

echo nl2br(htmlspecialchars($row['reply_message']));

}

?>

</div>

</td>

</tr>

<tr>

<td class="label">Responded By</td>

<td>

<?php

echo empty($row['responded_by'])
        ? "Not Available"
        : htmlspecialchars($row['responded_by']);

?>

</td>

</tr>

<tr>

<td class="label">Response Date</td>

<td>

<?php

echo empty($row['response_date'])
        ? "-"
        : date("d-m-Y",strtotime($row['response_date']));

?>

</td>

</tr>

<tr>

<td class="label">Admission Letter</td>

<td>

<?php

if($row['request_status']=="Approved" && !empty($row['admission_letter']))
{

?>

<a class="download"
href="uploads/admission_letters/<?php echo htmlspecialchars($row['admission_letter']); ?>"
target="_blank">

Download Admission Letter

</a>

<?php

}
else
{

echo "Not Available";

}

?>

</td>

</tr>

</table>

</div>

</div>

</body>

</html>

<?php

$stmt->close();
$conn->close();

?>
