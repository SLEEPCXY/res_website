<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            
            <div class="input-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
            </div>
            
            <div class="input-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber">
            </div>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>


<?php
// 连接数据库
include 'database_config.php';
// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 处理用户注册
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];

    // 准备 SQL 查询语句
    $sql = "INSERT INTO users (UserName, Password, Address, PhoneNumber)
    VALUES ('$username', '$password', '$address', '$phoneNumber')";

    // 执行查询
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("恭喜删除所有数据");</script>';
        header("Location:login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
?>