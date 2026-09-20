
<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "studentproject");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['reply'])) {

    // Get form data
    $application_id = $_POST['admission_letter_id'];
    $status         = $_POST['status'];
    $message        = $_POST['reply_message'];
    $responded_by   = $_POST['responded_by'];
    $response_date  = $_POST['response_date'];

    // Upload admission letter
    $filename = "";

    if (isset($_FILES['admission_letter']) && $_FILES['admission_letter']['error'] == 0) {

        $folder = "uploads/admission_letters/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $filename = time() . "_" . basename($_FILES['admission_letter']['name']);

        $target = $folder . $filename;

        if (!move_uploaded_file($_FILES['admission_letter']['tmp_name'], $target)) {
            die("Failed to upload admission letter.");
        }
    }

    // Start transaction
    $conn->begin_transaction();

    try {

        // Insert reply
        $sql = "INSERT INTO request_reply
                (
                    admission_letter_id,
                    reply_status,
                    admission_letter,
                    reply_message,
                    responded_by,
                    response_date
                )
                VALUES
                (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "isssss",
            $application_id,
            $status,
            $filename,
            $message,
            $responded_by,
            $response_date
        );

        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }

        // Update student's application status
        $update = $conn->prepare("
            UPDATE admission_letter
            SET request_status = ?
            WHERE id = ?
        ");

        $update->bind_param("si", $status, $application_id);

        if (!$update->execute()) {
            throw new Exception($update->error);
        }

        // Commit transaction
        $conn->commit();

        echo "<script>
                window.href='admission_table.php';
              </script>";

        $stmt->close();
        $update->close();

    } catch (Exception $e) {

        // Roll back transaction on error
        $conn->rollback();

        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>