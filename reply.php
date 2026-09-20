<?php
require_once __DIR__ . '/database.php';
$data = database_connection();

// Get request ID from URL
if(isset($_GET['id'])){

    $id = $_GET['id'];

    $stmt = $data->prepare("SELECT * FROM admission_letter WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

    }else{
        die("No record found.");
    }

}else{
    die("Invalid Request.");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admission Letter Request Reply</title>

<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial, Helvetica, sans-serif;
    }

    body{
        background:#f4f7fb;
        padding:30px;
    }

    .container{
        max-width:900px;
        margin:auto;
        background:#fff;
        border-radius:8px;
        box-shadow:0 5px 15px rgba(0,0,0,.1);
        overflow:hidden;
    }

    .header{
        background:#0d6efd;
        color:#fff;
        padding:20px;
        text-align:center;
        font-weight:bold;
    }

    .header h2{
        margin-bottom:5px;
    }

    .section{
        padding:25px;
    }

    h3{
        color:#0d6efd;
        margin-bottom:15px;
        border-bottom:2px solid #eee;
        padding-bottom:8px;
    }

    .grid{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:15px;
    }

    .field{
        margin-bottom:15px;
    }

    .field label{
        display:block;
        font-weight:bold;
        margin-bottom:5px;
        color:#444;
    }

    .field input,
    .field textarea,
    .field select{
        width:100%;
        padding:10px;
        border:1px solid #ccc;
        border-radius:5px;
        font-size:15px;
    }

    textarea{
        resize:vertical;
        min-height:120px;
    }

    .full{
        grid-column:1 / -1;
    }

    .buttons{
        text-align:right;
        margin-top:20px;
    }

    button{
        padding:12px 25px;
        border:none;
        border-radius:5px;
        cursor:pointer;
        font-size:15px;
        margin-left:10px;
    }

    .send{
        background:#198754;
        color:white;
    }

    .reset{
        background:#dc3545;
        color:white;
    }

    .readonly{
        background:#f8f9fa;
    }

    @media(max-width:768px){
        .grid{
            grid-template-columns:1fr;
        }
    }
</style>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 

</head>
<body> 

     <div class="field full">
        <label>Result Slip</label>

        <?php if(!empty($row['result_slip'])){ ?>

            <a href="uploads/<?php echo urlencode($row['result_slip']); ?>"
               target="_blank">
               📄 View Uploaded Result Slip
            </a>

        <?php }else{ ?>

            <span>No Result Slip Uploaded</span>

        <?php } ?>

    </div>

    <div class="section">

        <h3>Admission Office Response</h3>

        <form action="office_insert.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="admission_letter_id" value="<?php echo $id; ?>">

    <div class="grid">

        <div class="field">
            <label>Reply Status</label>
            <select name="status" required>
                <option value="">--Select decision--</option>
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>

        <div class="field">
            <label>Admission Letter (PDF)</label>
            <input type="file"
                   name="admission_letter"
                   accept=".pdf">
        </div>

        <div class="field full">
            <label>Reply Message</label>
            <textarea name="reply_message"
            placeholder="Write your response to the student..."></textarea>
        </div>

        <div class="field">
            <label>Responded By</label>
            <input type="text"
                   name="responded_by"
                   placeholder="Admissions Officer">
        </div>

        <div class="field">
            <label>Response Date</label>
            <input type="date" name="response_date">
        </div>

    </div>

    <button type="submit" name="reply" class="btn btn-success">Send Reply</button>

</form>

    </div>

</div>

</body>
</html>
