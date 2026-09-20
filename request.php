<?php
$data=new mysqli("localhost","root","","studentproject");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $student_sdms_code = $_POST['student_id'];
    $full_name = $_POST['fullname'];
    $email_address = $_POST['email'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone'];
    $trade_program = $_POST['class'];
    $academic_year = $_POST['academic_year'];
    $semester = $_POST['term'];
    $requested_level = $_POST['level'];
    $purpose = $_POST['purpose'];
    $comments = $_POST['comments'];

    // Default values
    $request_status = "Pending";
    $result_slip = "";

    // Upload folder
    $uploadDir = "uploads/";

    // Create uploads folder if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Upload file if selected
    if (!empty($_FILES["result_slip"]["name"])) {

        $fileName = time() . "_" . basename($_FILES["result_slip"]["name"]);
        $targetFile = $uploadDir . $fileName;

        $allowed = ['pdf', 'jpg', 'jpeg', 'png'];
        $extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (in_array($extension, $allowed)) {

            if (move_uploaded_file($_FILES["result_slip"]["tmp_name"], $targetFile)) {
                $result_slip = $targetFile;
            } else {
                die("Failed to upload result slip.");
            }

        } else {
            die("Only PDF, JPG, JPEG and PNG files are allowed.");
        }
    }

    // Insert into database
    $sql = "INSERT INTO admission_letter
    (
        student_sdms_code,
        full_name,
        email_address,
        gender,
        phone_number,
        trade_program,
        academic_year,
        term,
        requested_level,
        result_slip,
        purpose_of_admission_letter,
        additional_comments,
        request_status
    )
    VALUES
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $data->prepare($sql);

    $stmt->bind_param(
        "sssssssssssss",
        $student_sdms_code,
        $full_name,
        $email_address,
        $gender,
        $phone_number,
        $trade_program,
        $academic_year,
        $semester,
        $requested_level,
        $result_slip,
        $purpose,
        $comments,
        $request_status
    );

    if ($stmt->execute()) {
        echo "<script>
                alert('Admission letter request submitted successfully.');
                window.location='index.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $data->close();
}
?>