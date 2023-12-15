<!DOCTYPE html>
<html>
<head>
    <title>查看和修改用户信息</title>
</head>
<body>

<?php
// 连接数据库，假设使用 MySQLi 扩展
include 'database_config.php';

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

    // 获取用户输入的用户名
    $username = $_COOKIE["username"];

    // 查询数据库获取地址和电话号码
    $sql = "SELECT Address, PhoneNumber FROM users WHERE UserName = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 输出用户信息
        while($row = $result->fetch_assoc()) {
            echo "Address: " . $row["Address"]. "<br>";
            echo "PhoneNumber: " . $row["PhoneNumber"]. "<br>";
        }
    } else {
        echo "未找到相关记录";
    }

?>

<h2>修改用户信息</h2>
<form method="post" action="./users/m_pernal.php">
    用户名: <input type="text" name="UserName"><br>
    密码: <input type="password" name="Password"><br>
    地址: <input type="text" name="Address"><br>
    电话号码: <input type="text" name="PhoneNumber"><br>
    <input type="submit" value="修改">
</form>

</body>
</html>
