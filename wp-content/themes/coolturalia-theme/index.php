<!DOCTYPE html>
<?php
$theme_path = get_stylesheet_directory_uri();
?>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }
        form {
            margin: 0 auto;
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #999;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            box-shadow: 0px 0px 5px #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type=submit] {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        input[type=submit]:hover {
            background-color: #666;
        }
    </style>
</head>
<body>
<h2>Login</h2>
<form action="<?php echo $theme_path?>/login.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <input type="submit" value="Login">
</form>
</body>
</html>