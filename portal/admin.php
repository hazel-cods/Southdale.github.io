<?php
session_start();
if (!isset($_SESSION['first_name'])) {
    header("Location: login.php");
    exit();
}
$first_name = $_SESSION['first_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Portal Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dash.css">
    <style>
        body {
            background-size: cover;
            background-image: url(/photos/bg1.jpg);
            background-repeat: no-repeat;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .main-content {
            width: 100%;
            height: 70vh;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    include 'sidebar.php'
    ?>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="text-primary">Welcome, <?php echo htmlspecialchars($first_name); ?>!</h1>
        <p class="text-muted">Explore your dashboard.</p>
    </div>


    <script>
        function checkAdmin() {
            let password = prompt("Enter Admin Password:");
            if (password !== "admin123") {
                alert("Access Denied!");
            } else {
                window.location.href = "admin.php";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>