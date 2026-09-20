<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admission Letter Request</title>

<style>
body{
    font-family:Arial,sans-serif;
    background:skyblue;
}

.container{
    width:650px;
    margin:30px auto;
    background:#fff;
    padding:20px;
    border-radius:8px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    color:#004080;
}

label{
    display:block;
    margin-top:12px;
    font-weight:bold;
}

input, select, textarea{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:5px;
    box-sizing:border-box;
}

textarea{
    resize:vertical;
}

.level{
    width:auto;
}

button{
    margin-top:20px;
    padding:10px 20px;
    border:none;
    border-radius:5px;
    color:white;
    cursor:pointer;
}

.submit{
    background:#007bff;
}

.reset{
    background:#dc3545;
}
</style>

<script>
function checkSlip(){

    var level=document.querySelector('input[name="level"]:checked').value;
    var slip=document.getElementById("slip");

    if(level=="S1" || level=="S4"){
        slip.required=true;
    }else{
        slip.required=false;
    }

}
</script>

</head>

<body>

<div class="container">

<h2>Admission Letter Request Form</h2>

<form action="request.php" method="POST" enctype="multipart/form-data">

<label>Student SDMS CODE</label>
<input type="text" name="student_id" required>

<label>Full Name</label>
<input type="text" name="fullname" required>

<label>Email Address</label>
<input type="email" name="email" required>
  <label>Select Your Gender</label></br>
 <input type="radio" id="male" name="gender" value="Male"> Male
<input type="radio" id="female" name="gender" value="Female"> Female

<label>Phone Number</label>
<input type="text" name="phone" required>


<label>Trade/program</label>

<select name="class" required>
<option value="">--Select trade--</option>
<option>N1</option>
<option>P1</option>
<option>S1</option>
<option>COMPUTER SYSTEM AND ARCHITECTURE(L3)</option>
<option>SOFTWARE DEVELOPMENT(L3)</option>

</select>

<label>Academic Year</label>
<input type="text" name="academic_year"
placeholder="2026/2027" required>

<label>Term</label>

<select name="term" required>
<option value="">--Select Term--</option>
<option>Term I</option>
<option>Term II</option>
<option>Term III</option>
</select>

<label>Requested Level</label>

<input type="radio" name="level" value="L3" onclick="checkSlip()" > L3
<input type="radio" name="level" value="S1" onclick="checkSlip()"> S1
<input type="radio" name="level" value="P1" onclick="checkSlip()"> P1
<input type="radio" name="level" value="N1" onclick="checkSlip()"> N1

<label>Upload Result Slip for <b>S1</b> Or <b>L3</b></label>
<input type="file"
name="result_slip"
id="slip"
accept=".pdf,.jpg,.png,.jpeg">

<label>Purpose of Admission Letter</label>

<select name="purpose" required>
<option value="">--Select Purpose--</option>
<option>ongoing in L3</option>
<option>Scholarship</option>
<option>Internship</option>
<option>Employment</option>
<option>Other</option>
</select>

<label>Additional Comments</label>
<textarea name="comments" rows="4"></textarea>

<button type="submit" class="submit">Request Admission Letter</button>

<button type="reset" class="reset">Clear Form</button>

</form>

</div>

</body>
</html>