<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks & Assignments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dash.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background: #34495e;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }
    </style>
</head>

<body>

    <?php
    include 'sidebar.php'
    ?>

    <div class="content-tasks">
        <h2>Activities & Assignments</h2>
        <div class="activity-container">
            <div class="activity-card">
                <div class="activity-title">Science Experiment</div>
                <div class="activity-date">Due: March 1, 2025</div>
                <div class="activity-description">Prepare a volcano eruption experiment using baking soda and vinegar.</div>
            </div>

            <div class="activity-card">
                <div class="activity-title">Math Quiz</div>
                <div class="activity-date">Due: March 3, 2025</div>
                <div class="activity-description">Solve 20 algebra problems from the textbook, Chapter 5.</div>
            </div>

            <div class="activity-card">
                <div class="activity-title">History Report</div>
                <div class="activity-date">Due: March 5, 2025</div>
                <div class="activity-description">Write a 2-page report on World War II and its impact on modern society.</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>