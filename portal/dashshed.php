<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Schedules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dash.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            padding: 0;
            background-color: #eef2f3;
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

    <div class="content-sched">
        <h2>Class Schedule for All Grade Levels</h2>
        <table class="schedule-table">
            <tr>
                <th>Grade Level</th>
                <th>Monday - Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
            <tr>
                <td>Primary School</td>
                <td>8:00 AM - 3:00 PM</td>
                <td class="important">Closed</td>
                <td class="important">Closed</td>
            </tr>
            <tr>
                <td>Junior High</td>
                <td>8:30 AM - 3:30 PM</td>
                <td>8:00 AM - 12:00 PM</td>
                <td class="important">Closed</td>
            </tr>
            <tr>
                <td>Senior High</td>
                <td>9:00 AM - 4:00 PM</td>
                <td>8:30 AM - 12:30 PM</td>
                <td class="important">Closed</td>
            </tr>
            <tr>
                <td>College</td>
                <td>8:00 AM - 5:00 PM</td>
                <td>8:00 AM - 2:00 PM</td>
                <td class="important">Closed</td>
            </tr>
        </table>
    </div>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>