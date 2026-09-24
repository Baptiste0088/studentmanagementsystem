<?php
session_start();
if (!isset($_SESSION['user_id'], $_SESSION['email']) || ($_SESSION['role'] ?? null) !== 'teacher') {
    header('Location: login_form.php');
    exit;
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
    <title>teacher page</title>
</head>
<body>
     <header class="header">
        <a href="">Teacher Dashbord</a>

        <div class="logout">
       <a href="logout.php" class="btn btn-danger">Logout</a>

        </div>
</header>
<aside>
<ul>

<li><a href="">Add marks</li>
<li><a href="">View marks</li>
<li><a href="">Add module</li>
<li><a href="">View Module</li>


</ul>
</aside>
<div class="content">
    <h1>Welcome to Teacher Dashboard</h1>

</div>
</body>
</html>