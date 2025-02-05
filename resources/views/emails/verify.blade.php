<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
            margin: 0;
        }

        /* Container for the email */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-top: 4px solid #16a085;
        }

        /* Header style */
        h1 {
            color: #16a085;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Paragraph style */
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Button style */
        .btn {
            display: inline-block;
            background-color: #16a085;
            color: white;
            padding: 12px 30px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #1abc9c;
        }

        /* Footer style */
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 30px;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .email-container {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            p, .btn {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="email-container">
    <h1>Email Verification</h1>

    <p>Thank you for registering with us! To complete your registration, please verify your email address by clicking the button below:</p>

    <!-- Verification button -->
    <a href="{{ $verificationUrl }}" class="btn">Verify Email Address</a>

    <p>If you did not create an account, no further action is required.</p>

    <!-- Footer -->
    <div class="footer">
        <p>If you have any questions, feel free to contact us at <a href="mailto:support@pharma.com" style="color: #16a085;">support@pharma.com</a>.</p>
        <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </div>
</div>

</body>
</html>
