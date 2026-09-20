
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 950px;
            margin: auto;
        }

        .card {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
            color: #1f2937;
        }

        .title h2 {
            margin-bottom: 8px;
        }

        .title p {
            color: #6b7280;
        }

        .form-layout {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 35px;
        }

        /* Photo Section */
        .photo-section {
            text-align: center;
        }

        .photo-preview {
            width: 200px;
            height: 200px;
            border: 2px dashed blue;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f9fafb;
            border-radius:200px;
        }

        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            border-radius:30px;

        }

        .photo-placeholder {
            color: #6b7280;
            font-size: 14px;
            padding: 15px;
        }

        .upload-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .upload-btn:hover {
            background: #1d4ed8;
        }

        #photo {
            display: none;
            
        }

        .photo-note {
            margin-top: 10px;
            font-size: 12px;
            color: #6b7280;
        }

        /* Form */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: span 2;
        }

        label {
            margin-bottom: 7px;
            font-weight: bold;
            color: #374151;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            padding: 11px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        button {
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-save {
            background: #16a34a;
            color: white;
        }

        .btn-save:hover {
            background: #15803d;
        }

        .btn-reset {
            background: #6b7280;
            color: white;
        }

        .btn-reset:hover {
            background: #4b5563;
        }

        @media (max-width: 700px) {
            .form-layout {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: span 1;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="title">
            <h2>Student Profile</h2>
            <p>Enter student information and upload a profile photo</p>
        </div>

        <form action="save_student.php" method="POST" enctype="multipart/form-data">

            <div class="form-layout">

                <!-- PHOTO UPLOAD -->
                <div class="photo-section">

                    <div class="photo-preview">
                        <span class="photo-placeholder" id="placeholder">
                            Student Photo
                        </span>

                        <img id="preview" src="#" alt="Student Photo">
                    </div>

                    <label for="photo" class="upload-btn">
                        Upload Photo
                    </label>

                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/*"
                        onchange="previewPhoto(event)"
                    >

                    <div class="photo-note">
                        JPG, JPEG or PNG<br>
                        Maximum recommended size: 2MB
                    </div>

                </div>


                <!-- STUDENT INFORMATION -->
                <div class="form-grid">

                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input
                            type="text"
                            id="student_id"
                            name="student_id"
                            placeholder="Enter student ID"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="registration_no">Registration Number</label>
                        <input
                            type="text"
                            id="registration_no"
                            name="registration_no"
                            placeholder="Enter registration number"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            placeholder="Enter first name"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            placeholder="Enter last name"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="">-- Select Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input
                            type="date"
                            id="dob"
                            name="dob"
                            required
                        >
                    </div>

                    <div class="form-group">
    <label for="class">Class</label>

    <select id="class" name="class" required onchange="goToClass(this.value)">
        <option value="">-- Select Class --</option>
        <option value="s1.php">Senior 1</option>
        <option value="s2.php">Senior 2</option>
        <option value="s3.php">Senior 3</option>
        <option value="s4.php">Senior 4</option>
        <option value="s5.php">Senior 5</option>
        <option value="s6.php">Senior 6</option>
    </select>
</div>

                    <div class="form-group">
                        <label for="combination">Combination</label>
                        <input
                            type="text"
                            id="combination"
                            name="combination"
                            placeholder="e.g. MPC, MCB, PCB"
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="Enter phone number"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter email address"
                        >
                    </div>

                    <div class="form-group full">
                        <label for="address">Address</label>
                        <textarea
                            id="address"
                            name="address"
                            placeholder="Enter student's address"
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="guardian_name">Parent/Guardian Name</label>
                        <input
                            type="text"
                            id="guardian_name"
                            name="guardian_name"
                            placeholder="Enter parent/guardian name"
                        >
                    </div>

                    <div class="form-group">
                        <label for="guardian_phone">Parent/Guardian Phone</label>
                        <input
                            type="tel"
                            id="guardian_phone"
                            name="guardian_phone"
                            placeholder="Enter guardian phone"
                        >
                    </div>

                </div>

            </div>


            <!-- BUTTONS -->
            <div class="buttons">
                <button type="reset" class="btn-reset">
                    Reset
                </button>

                <button type="submit" class="btn-save">
                    Save Student
                </button>
            </div>

        </form>

    </div>

</div>


<script>

function previewPhoto(event) {

    const input = event.target;
    const preview = document.getElementById("preview");
    const placeholder = document.getElementById("placeholder");

    if (input.files && input.files[0]) {

        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = "block";
            placeholder.style.display = "none";
        };

        reader.readAsDataURL(input.files[0]);
    }
}

</script>

</body>
</html>

