<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Sizzles and Sage</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #2288ff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header img {
            width: 150px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .content h1 {
            color: #192f6a;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #314862;
        }
        .footer {
            background-color: #192f6a;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://yourdomain.com/path/to/logo.png" alt="Sizzles and Sage Logo">
        </div>
        <div class="content">
            <h1>Welcome to Sizzles and Sage!</h1>
            <p>Dear {{ $user->name }},</p>
            <p>We are thrilled to welcome you to Sizzles and Sage, where exceptional dining experiences await you. Thank you for joining our family. We can’t wait for you to explore our delectable menu and indulge in the finest cuisine we have to offer.</p>
            <p>As a member of our exclusive community, you will be among the first to hear about our latest offerings, special events, and irresistible promotions.</p>
            <p>If you have any questions or need assistance, please don’t hesitate to reach out. We are here to ensure your experience is nothing short of extraordinary.</p>
            <p>We look forward to serving you!</p>
            <p>Warm regards,</p>
            <p>The Sizzles and Sage Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Sizzles and Sage. All rights reserved.
        </div>
    </div>
</body>
</html>
