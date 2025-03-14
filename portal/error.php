<?php
$error_message = isset($_GET['message']) ? $_GET['message'] : "An unexpected error occurred.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - Registration</title>
    <link rel="stylesheet" href="form.css">
    <style>
        body {
            background-color: #f8d7da;
            color: #721c24;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .error-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .error-container h3 {
            color: #dc3545;
        }

        .error-container p {
            font-size: 18px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <div class="error-container">
        <h3>Oops! Something went wrong</h3>
        <p><?php echo htmlspecialchars($error_message); ?></p>
        <a href="register.php" class="back-btn">Go Back to Registration</a>
    </div>

</body>

</html>