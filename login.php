<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <form action="users_pernal.php" method="post">
        <input type="hidden"name="UserName">
        <script>
    // 获取username输入框的值
        var username = document.getElementById('username').value;
    
    // 将值赋给隐藏的input标签
        document.getElementById('UserName').value = username;
        </script>
    </form>

</body>
</html>


<?php
// 连接到数据库
include 'database_config.php';

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 获取提交的表单数据
$username = $_POST['username'];
$password = $_POST['password'];

// 设置 Cookie
setcookie("username", $username, time() + (86400 * 30), "/"); // 30 days expiration, change this as needed

// 查询普通用户表
$sql = "SELECT * FROM users WHERE UserName = '$username' AND Password = '$password'";
$result = $conn->query($sql);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($result->num_rows > 0) {
        // 找到普通用户，跳转到 common_user.html
        header("Location: common_user.html");
        exit;
    } else {
        // 在管理员表中查找
        $sql = "SELECT * FROM administrators WHERE AdminUserName = '$username' AND AdminPassword = '$password'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // 找到管理员，跳转到 Administrator.html
            header("Location: Administrator.html");
            exit;
        } else {
            // 用户名或密码错误
            echo '<script>alert("Invalid username or password");</script>';
        }
    }
}


$conn->close();
?>
