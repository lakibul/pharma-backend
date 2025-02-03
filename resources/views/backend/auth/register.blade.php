<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style type="text/css">
        /* Global Styles */
        * {
            padding: 0;
            margin: 0;
            color: #333;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            min-height: 100%;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        h1 {
            font-size: 28px;
            color: #16a085;
            margin-bottom: 16px;
        }
        a {
            text-decoration: none;
        }

        /* Form Container */
        .formbg-outer {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .formbg {
            width: 100%;
            max-width: 450px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .formbg-inner {
            padding: 24px;
        }

        /* Input Fields */
        .field {
            margin-bottom: 24px;
        }
        .field input {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            background-color: #f9f9f9;
            transition: 0.3s;
        }
        .field input:focus {
            border-color: #16a085;
            background-color: #fff;
        }

        /* Submit Button */
        input[type="submit"] {
            background-color: #16a085;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 14px;
            width: 100%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #1abc9c;
        }

        /* Form Texts */
        .formbg h1 {
            text-align: center;
        }

        /* Bottom Links */
        .form-actions {
            text-align: center;
            margin-top: 20px;
        }
        .form-actions a {
            color: #16a085;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: 0.3s;
        }
        .form-actions a:hover {
            color: #1abc9c;
        }

        /* Small Screen Responsiveness */
        @media (max-width: 600px) {
            .formbg {
                padding: 30px;
            }
            .form-actions {
                margin-top: 16px;
            }
        }
    </style>
</head>

<body>

<div class="formbg-outer">
    <div class="formbg">
        <h1>Sign Up</h1>
        <div class="formbg-inner">
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                <input type="submit" value="Register">
            </form>

            <div class="form-actions">
                <p>Already have an account? <a href="{{ route('admin.login.form') }}">Login</a></p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#loading").hide();

    function submitconfirm(){
        var email    = $("#email").val();
        var password = $("#password").val();

        if (email == "" && password == "") {
            alert("Please Enter Email and Password")
        } else {
            $("#submit").hide();
            $("#loading").show();
        }
    }
</script>

</body>
</html>
