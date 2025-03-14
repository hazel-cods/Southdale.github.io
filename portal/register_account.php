<?php
session_start();
include 'db_connect.php'; // Ensure database connection is established

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password']; // Store raw password first

    // 1️⃣ Validate Input Fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "<script>alert('Error: All fields are required.'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Error: Invalid email format.'); window.history.back();</script>";
        exit;
    }

    if (strlen($password) < 6) {
        echo "<script>alert('Error: Password must be at least 6 characters long.'); window.history.back();</script>";
        exit;
    }

    // Hash the password securely
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // 2️⃣ Check if Email Exists in `students` Table (Ensure student has registered first)
    $check_email = $conn->prepare("SELECT * FROM students WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows == 0) {
        echo "<script>alert('Error: You must complete the student registration form first.'); window.location.href='register.php';</script>";
        exit;
    }

    // 3️⃣ Check if Email Already Exists in `users` Table
    $check_account = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_account->bind_param("s", $email);
    $check_account->execute();
    $account_result = $check_account->get_result();

    if ($account_result->num_rows > 0) {
        echo "<script>alert('Error: An account with this email already exists.'); window.history.back();</script>";
        exit;
    }

    // 4️⃣ Insert the New Account into `users` Table
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $password_hashed);

    if ($stmt->execute()) {
        echo "<script>alert('Account created successfully! Redirecting to login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Database error: " . $stmt->error . "'); window.history.back();</script>";
    }

    // 5️⃣ Close Connections
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Account</title>
    <link rel="stylesheet" href="portal.css">
    <script>
        function validateForm() {
            let firstName = document.forms["registerForm"]["first_name"].value.trim();
            let lastName = document.forms["registerForm"]["last_name"].value.trim();
            let email = document.forms["registerForm"]["email"].value.trim();
            let password = document.forms["registerForm"]["password"].value;

            if (firstName === "" || lastName === "" || email === "" || password === "") {
                alert("All fields are required.");
                return false;
            }
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Invalid email format.");
                return false;
            }
            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }
            return true;
        }

        function togglePassword() {
            let passwordInput = document.getElementById("register_password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }
    </script>
</head>

<body>
    <div class="card p-4 shadow-lg" style="width: 350px;">
        <h3 class="text-center">Register</h3>
        <form name="registerForm" method="POST" onsubmit="return validateForm()">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" id="register_password" name="password" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Show</button>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
        <p> Already have an account? <a href="login.php">Login</a></p> <br>
        <p> fill up this first<a href="/form/register.php"> form</a></p>

    </div>
</body>

</html>