<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('Error: All fields are required.'); window.history.back();</script>";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Error: Invalid email format.'); window.history.back();</script>";
        exit;
    }

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['first_name'] = $row['first_name'];
            echo "<script>alert('Login successful. Redirecting to dashboard.'); window.location.href='dashboard.php';</script>";
            exit;
        } else {
            echo "<script>alert('Error: Incorrect password.'); window.history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Error: No account found with this email. Please register first.'); window.location.href='register_account.php';</script>";
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="portal.css">
    <script>
        function validateForm() {
            let email = document.forms["loginForm"]["email"].value.trim();
            let password = document.forms["loginForm"]["password"].value;

            if (email === "" || password === "") {
                alert("All fields are required.");
                return false;
            }
            return true;
        }

        function togglePassword() {
            let passwordInput = document.getElementById("password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }
    </script>
</head>

<body>
    <div class="card">
        <h3>Login</h3>
        <form name="loginForm" method="POST" onsubmit="return validateForm()">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" required>
                    <button type="button" onclick="togglePassword()">Show</button>
                </div>
            </div>
            <br>
            <button type="submit" class="btn-success">Login</button>
        </form>
        <p><a href="register.php">Register Here</a></p>
    </div>
</body>

</html>