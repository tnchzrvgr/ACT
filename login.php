<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        body {
            background-image: url(assets/bg5.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            height: 465px;
            width: 90%;
            max-width: 350px;
        }

        label {
            margin-left: 20px;
            display: block;
            color: whitesmoke;
        }

        .label2 {
            margin-left: 20px;
            color: whitesmoke;
        }

        input[type=text] {
            width: calc(100% - 60px);
            margin-left: 20px;
            display: block;
            height: 36px;
            border-radius: 12px;
            outline: none;
            border: solid white;
            margin-top: 40px;
            margin-bottom: 15px;
            padding-left: 15px;
        }

        input[type=password] {
            width: calc(100% - 60px);
            margin-left: 20px;
            display: block;
            height: 36px;
            border-radius: 12px;
            outline: none;
            border: solid white;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-left: 15px;
        }

        p {
            text-align: center;
            color: whitesmoke;
            font-size: 13px;
        }

        button {
            outline: none;
            cursor: pointer;
            border: none;
            padding: 0.9rem 2rem;
            margin: 0;
            position: relative;
            display: inline-block;
            letter-spacing: 0.05rem;
            font-weight: 700;
            font-size: 14px;
            border-radius: 500px;
            overflow: hidden;
            background: #7d857d;
            color: ghostwhite;
            margin-left: 20px;
            margin-top: 20px;
            width: calc(100% - 40px);
            margin-right: 20px;
        }

        h2 {
            padding-top: 20px;
            text-align: center;
            font-weight: bolder;
            color: whitesmoke;
            padding-bottom: 15px;
        }

        a {
            color: white;
            font-weight: bolder;
            text-decoration: none
        }

        .checkbox-1 {
            padding-top: 5px;
            padding-bottom: 30px;
            margin-left: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox-1 label {
            display: inline;
            font-size: 13px;
            margin: 0;
            font-weight: 200;
        }

        .checkbox-1 input {
            margin: 0;
        }

        .checkbox-1 span {
            font-size: 13px;
            margin-left: 80px;
        }

        .error{
            color: red;
            font-size: 12px;
            margin-left: 30px;
            margin-top: -15px;
            margin-bottom: 20px;
        }

        #loginButton:disabled {
            background-color: red;
            color: white;
            cursor: not-allowed;
            opacity: 1;
        }
    </style>
</head>

<body>
    <?php
        $emailErr = $passwordErr = "";
        $Email = $Password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Cemail = "admin@gmail.com";
            $Cpassword = "123456";

            $Email = $_POST["Email"];
            $Password = $_POST["Password"];

            if($Email === $Cemail && $Password === $Cpassword){
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }

            if (empty($_POST["Email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["Email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["Password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = test_input($_POST["Password"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <div class="container">
        <form id="loginForm" method="POST">
            <h2>LOGIN</h2>
            <input type="text" placeholder="eg.johngmail.com" name="Email" id="Email">
            <span class="error"><?php echo $emailErr; ?></span>
            <input type="password" placeholder="•••••••••" name="Password" id="Password">
            <span class="error"><?php echo $passwordErr; ?></span>
            <div class="checkbox-1">
                <input type="checkbox">
                <label for="remember">Remember me <span><a href="">Forgot Password?</a></span></label>
            </div>
            <button type="submit" id="loginButton"><span>Login</span></button>
            <p>Don't Have an account? <a href="register.php">Sign up</a></p>
            <p id="message"></p>
        </form>
    </div>
</body>

</html>