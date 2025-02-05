<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f4f7fc;
            padding: 0;
            margin: 0;
        }

        /* Center the content */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            padding: 20px;
        }

        .content-box {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 28px;
            color: #16a085;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            background-color: #16a085;
            color: #fff;
            padding: 12px 24px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #1abc9c;
        }

        /* Footer Styling */
        .footer {
            font-size: 14px;
            color: #888;
            margin-top: 20px;
        }

        /* Responsive Styling */
        @media (max-width: 600px) {
            .content-box {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            p, .btn {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="content-box">
        <h1>Email Verification</h1>
        <p>An email has been sent to your email address. Please check your inbox (or spam folder) and click the verification link to complete your registration.</p>
        <a href="{{ route('user.login.form') }}" class="btn">Go to Login</a>

        <div class="footer">
            <p>If you did not create an account, no further action is required.</p>
        </div>
    </div>
</div>

</body>
</html>
