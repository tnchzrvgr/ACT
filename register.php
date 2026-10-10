<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com" rel="stylesheet">

    <style>
        body {
            background-image: url(assets/bg4.jpg);
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
            height: 590px;
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

        input[type=text],
        input[type=password] {
            width: calc(100% - 60px);
            margin-left: 20px;
            display: block;
            height: 36px;
            border-radius: 12px;
            outline: none;
            border: solid white;
            margin-top: 10px;
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
            margin: 20px 0 0 20px;
            position: relative;
            display: block;
            letter-spacing: 0.05rem;
            font-weight: 700;
            font-size: 14px;
            border-radius: 500px;
            overflow: hidden;
            background: #66ff66;
            color: ghostwhite;
            width: calc(100% - 40px);
            box-sizing: border-box;
        }

        button span {
            position: relative;
            z-index: 10;
            transition: color 0.4s;
        }

        button:hover span {
            color: black;
        }

        button::before,
        button::after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        button::before {
            content: "";
            background: #000;
            width: 120%;
            left: -10%;
            transform: skew(30deg);
            transition: transform 0.4s cubic-bezier(0.3, 1, 0.8, 1);
        }

        button:hover::before {
            transform: translate3d(100%, 0, 0);
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

        .error {
            display: block;
            color: red;
            font-size: 12px;
            margin-left: 30px;
            margin-top: 0;
            margin-bottom: 0;
            min-height: 14px;
        }
    </style>
</head>

<body>
    <?php
    $usernameErr = $emailErr = $phoneErr = $passwordErr = $confirmPasswordErr = "";
    $Username = $Email = $Phone = $Password = $ConfirmPassword = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["Username"])) {
            $usernameErr = "Username is required";
        } else {
            $Username = test_input($_POST["Username"]);
        }

        if (empty($_POST["Email"])) {
            $emailErr = "Email is required";
        } else {
            $Email = test_input($_POST["Email"]);
                if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
        }

        if (empty($_POST["Phone"])) {
            $phoneErr = "Phone number is required";
        } else {
            $Phone = test_input($_POST["Phone"]);
            if (!filter_var($Phone, FILTER_VALIDATE_INT)){
                $phoneErr = "Phone number must contain integers only";
            }
        }

        if (empty($_POST["Password"])) {
            $passwordErr = "Password is required";
        } else {
            $Password = test_input($_POST["Password"]);
        }

        if (empty($_POST["ConfirmPassword"])) {
            $confirmPasswordErr = "Confirm Password is required";
        } else {
            $ConfirmPassword = test_input($_POST["ConfirmPassword"]);
            if ($ConfirmPassword !== $Password) {
                $confirmPasswordErr = "Passwords do not match";
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <div class="container">
        <form id="registerForm" method="POST">
            <h2>REGISTER</h2>
            <input type="text" placeholder="Username" name="Username">
            <span class="error"><?php echo $usernameErr; ?></span>
            <input type="text" placeholder="Email" name="Email">
            <span class="error"><?php echo $emailErr; ?></span>
            <input type="text" placeholder="Phone Number" name="Phone">
            <span class="error"><?php echo $phoneErr; ?></span>
            <input type="password" placeholder="Password" id="Password" name="Password">
            <span class="error"><?php echo $passwordErr; ?></span>
            <input type="password" placeholder="Confirm Password" id="ConfirmPassword" name="ConfirmPassword">
            <span class="error"><?php echo $confirmPasswordErr; ?></span>
            <button><span>Register</span></button>
            <p>Already have an account? <a href="login.php">Login Here</a></p>
        </form>
    </div>
</body>

</html>