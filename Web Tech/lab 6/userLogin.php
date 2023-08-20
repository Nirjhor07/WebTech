<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #3498db;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nav-item {
            padding: 10px 20px;
        }
        .nav-item a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #3498db;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .create-account {
            text-align: center;
            margin-top: 10px;
        }
        .create-account a {
            color: #3498db;
            text-decoration: none;
        }
    </style>

</head>
<body>
    <h1>Login</h1>
    <ul>
        <li class="nav-item active"><a href="MainHome.php">Home</a></li>
        <li class="nav-item"><a href="Registationpage.html">Signup</a></li>
    </ul>
    <div class="container">
        <form name="login" action="controller/login.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" placeholder="Enter your Email">
            <label for="passWord">Password:</label>
            <input type="password" name="passWord" class="form-control" placeholder="Enter your Password">
            <input type="submit" name="submit" value="Submit" class="btn">
            <div class="create-account">
                <a href="Registationpage.html">Create an account</a>
            </div>
        </form>
    </div>
</body>
</html>
