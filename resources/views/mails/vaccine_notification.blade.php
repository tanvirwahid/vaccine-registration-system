<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #4CAF50; /* Change as needed */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Vaccine Appointment Notification</h2>

    <p>Dear {{ $name }},</p>

    <p>Please be informed that you are scheduled to take your vaccine tomorrow.</p>

    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Center:</strong> {{ $center }}</p>
    <p><strong>Address:</strong> {{ $address }}</p>

    <p>Please bring your NID card with you.</p>

    <p>Thank you!</p>
</div>

</body>
</html>
