<?php
session_start();
include 'db_connect.php'; // Ensure database connection is established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $mi = $_POST['mi'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $religion = $_POST['religion'];
    $status = $_POST['status'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $mother_name = $_POST['mother_name'];
    $mother_occupation = $_POST['mother_occupation'];
    $mother_phone = $_POST['mother_phone'];
    $father_name = $_POST['father_name'];
    $father_occupation = $_POST['father_occupation'];
    $father_phone = $_POST['father_phone'];

    // Check if email already exists
    $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        header("Location: error.php?message=You have already registered!");
        exit();
    } else {
        // Insert into students table
        $sql = "INSERT INTO students (last_name, first_name, mi, age, birthday, religion, status, phone, email, country, zip, region, city, barangay, mother_name, mother_occupation, mother_phone, father_name, father_occupation, father_phone) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssissssssssssssssss", $last_name, $first_name, $mi, $age, $birthday, $religion, $status, $phone, $email, $country, $zip, $region, $city, $barangay, $mother_name, $mother_occupation, $mother_phone, $father_name, $father_occupation, $father_phone);

        if ($stmt->execute()) {
            header("Location: register_account.php");
            exit();
        } else {
            header("Location: error.php?message=Error in registration: " . urlencode($stmt->error));
            exit();
        }
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="form.css">

</head>

<body>


    <div class="container-forms">
        <h2>Student Registration</h2>
        <div class="scrollable-form">
            <form class="registration-form" method="POST">

                <h3>Student Details</h3>

                <div class="form-group">
                    <div class="input-box"><input type="text" name="last_name" placeholder="Last Name" required></div>
                    <div class="input-box"><input type="text" name="first_name" placeholder="First Name" required></div>
                </div>
                <div class="form-group">
                    <div class="input-box"><input type="text" name="mi" placeholder="Middle Initial"></div>
                    <div class="input-box"><input type="number" name="age" placeholder="Age" required></div>
                </div>
                <div class="form-group">
                    <div class="input-box full-width"><input type="date" name="birthday" required></div>
                </div>
                <div class="form-group">
                    <div class="input-box"><input type="text" name="religion" placeholder="Religion"></div>
                    <div class="input-box"><input type="text" name="status" placeholder="Status"></div>
                </div>
                <div class="form-group">
                    <div class="input-box"><input type="text" name="phone" placeholder="Phone"></div>
                    <div class="input-box"><input type="email" name="email" placeholder="Email" required></div>
                </div>
                <div class="form-group">
                    <div class="input-box"><input type="text" name="country" placeholder="Country"></div>
                    <div class="input-box"><input type="text" name="zip" placeholder="ZIP Code"></div>
                </div>
                <div class="form-group">
                    <div class="input-box"><input type="text" name="region" placeholder="Region"></div>
                    <div class="input-box"><input type="text" name="city" placeholder="City"></div>
                </div>
                <div class="form-group">
                    <div class="input-box"><input type="text" name="barangay" placeholder="Barangay"></div>
                </div>
                <br>

                <h3>Background Information</h3>
                <br>

                <div class="form-group">
                    <div class="input-box"><input type="text" name="mother_name" placeholder="Mother's Name"></div>
                    <div class="input-box"><input type="text" name="father_name" placeholder="Father's Name"></div>
                </div>
                <div class="form-group">
                    <div class="input-box"><input type="text" name="mother_phone" placeholder="Mother's Phone"></div>
                    <div class="input-box"><input type="text" name="father_phone" placeholder="Father's Phone"></div>
                </div>
                <div class="form-group">
                    <div class="input-box"><input type="text" name="mother_occupation" placeholder="Mother's Occupation"></div>
                    <div class="input-box"><input type="text" name="father_occupation" placeholder="Father's Occupation"></div>
                </div>

                <button type="cancel">Cancel</button>
                <button type="submit">Register</button>
                <br> <br>
                <p id="regis-p"><a href="/homepage.php">Go to home </a></p>

            </form>
        </div>
    </div>

    <script src="form_validation.js" defer></script>

</body>

</html> 