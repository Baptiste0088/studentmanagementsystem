
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration Form</title>

    <style>

        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Page background */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Form container */
        .registration-container {
            width: 430px;
            background: white;
            padding: 35px;
            border-radius: 15px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.25);
        }

        /* Heading */
        .registration-container h2 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 10px;
            font-size: 28px;
        }

        /* Description */
        .registration-container p {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
            font-size: 14px;
        }

        /* Form group */
        .form-group {
            margin-bottom: 18px;
        }

        /* Labels */
        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #333;
            font-weight: bold;
            font-size: 15px;
        }

        /* Input and textarea */
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 13px 15px;

            border: 1px solid #ccc;
            border-radius: 8px;

            font-size: 15px;
            outline: none;

            transition: 0.3s;
        }

        /* Textarea */
        .form-group textarea {
            height: 120px;
            resize: vertical;
        }

        /* Input focus */
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        /* Submit button */
        .submit-btn {
            width: 100%;
            padding: 14px;

            border: none;
            border-radius: 8px;

            background: linear-gradient(
                135deg,
                #2563eb,
                #7c3aed
            );

            color: white;
            font-size: 16px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }

        /* Button hover */
        .submit-btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 6px 15px rgba(37, 99, 235, 0.35);
        }

        /* Button click */
        .submit-btn:active {
            transform: translateY(0);
        }

        /* Mobile responsive */
        @media (max-width: 500px) {

            .registration-container {
                width: 90%;
                padding: 25px;
            }

        }

    </style>
</head>

<body>

    <div class="registration-container">

        <h2>SUGGESTION Form</h2>

        <p>Please fill in the information below</p>

        <form action="#" method="POST">

            <!-- First Name -->
            <div class="form-group">
                <label for="firstname">First Name</label>

                <input
                    type="text"
                    id="firstname"
                    name="firstname"
                    placeholder="andika izina ryawe ribanza ,urugero: fred"
                    required
                >
            </div>

            <!-- Last Name -->
            <div class="form-group">
                <label for="lastname">Last Name</label>

                <input
                    type="text"
                    id="lastname"
                    name="lastname"
                    placeholder="andika ayandi mazina yawe,urugero: manzi"
                    required
                >
            </div>

            <!-- Telephone -->
            <div class="form-group">
                <label for="telephone">Telephone</label>

                <input
                    type="tel"
                    id="telephone"
                    name="telephone"
                    placeholder="andika nimero ya telephone"
                    required
                >
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label for="message">Message</label>

                <textarea
                    id="message"
                    name="message"
                    placeholder="andika igitekerezo cyawe hano"
                    required
                ></textarea>
            </div>

            <!-- Submit -->
            <button type="submit"  name="suggestion" class="submit-btn">
                OHEREZA IGITEKEREZO
            </button>

        </form>

    </div>

</body>
</html>
