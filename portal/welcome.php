<?php
session_start();
include 'db_connect.php';

// Check if the user has registered
if (!isset($_SESSION['registered_email'])) {
    echo "<script>alert('Access Granted! You can now proceed to Portal to create an account.'); window.location.href='login.php';</script>";
    exit;
}

$fullname = $_SESSION['registered_fullname'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($fullname); ?>!</h2>
        <p>Thank you for filling up the registration form.</p>
        <p>You may now proceed to the portal to create an account and access school information.</p>
        <div class="button-container">
            <a href="register_account.php" class="btn">Proceed to Portal</a>
            <a href="/homepage/administration/school_Info.php" class="btn secondary"> Explore</a>
        </div>
    </div>
</body>

</html>

