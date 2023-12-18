<!DOCTYPE html>
<html>
<head>
    <title>Modify personal information</title>
    <link rel = "stylesheet" type = "text/css" href="Style/headline.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        form {
            display: inline-block;
            text-align: left;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }
        form div {
            margin-bottom: 10px;
        }

        form label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
            margin-right: 20px;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 200px;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 160px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="welcome"><a href="common_user.html">Welcome</a></p>
        <ul>
            <li><a href="users_pernal.php">Modify personal information</a></li>
            <li><a href="users_do_order.php">Place an order</a></li>
            <li><a href="users_history_orders.php">View historical orders</a></li>
        </ul>
    </div>


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
            echo "<p>Address: " . $row["Address"]. "</p>";
            //echo "<p>PhoneNumber: " . $row["PhoneNumber"]. "</p>";
        }
    } else {
        echo "未找到相关记录";
    }
    ?>

    <h2>Modify personal information</h2>
    <form method="post" action="./users/m_pernal.php">
        <div>
            <label>Username:</label>
            <input type="text" name="UserName">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="Password">
        </div>
        <div>
            <label>Address:</label>
            <input type="text" name="Address">
        </div>
        <div>
            <label>Phone Number:</label>
            <input type="text" name="PhoneNumber">
        </div>
        <div>
            <input type="submit" value="Modify">
        </div>
    </form>
</body>
</html>
