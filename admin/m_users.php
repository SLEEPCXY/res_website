<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
</head>
<body>
    <h1>User Management</h1>
    <table border="1">
        <tr>
            <th>UserName</th>
            <th>Password</th>
            <th>Address</th>
            <th>PhoneNumber</th>
            <th>Action</th>
        </tr>
        <!-- PHP 代码 -->
        <?php
        // 连接数据库
        include '../database_config.php';
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }

        // 查询并展示数据
        $sql = "SELECT * FROM users"; // 表格名称
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['UserName'] . "</td>";
                echo "<td>" . $row['Password'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['PhoneNumber'] . "</td>";
                echo "<td><a href='./users/delete_user.php?UserName=" . $row['UserName'] . "'>Delete</a></td>"; // 删除按钮链接
                echo "</tr>";
            }
        } else {
            echo "0 结果";
        }
        ?>
    </table>
    <br>
    <h2>添加用户</h2>
    <form action="./users/add_user.php" method="post">
        UserName: <input type="text" name="UserName"><br>
        Password: <input type="password" name="Password"><br>
        Address: <input type="text" name="Address"><br>
        PhoneNumber: <input type="text" name="PhoneNumber"><br>
        <input type="submit" value="添加">
    </form>
    <br>
    <h2>修改用户</h2>
    <form action="./users/update_user.php" method="post">
        UserName: <input type="text" name="UserName"><br>
        Password: <input type="password" name="Password"><br>
        Address: <input type="text" name="Address"><br>
        PhoneNumber: <input type="text" name="PhoneNumber"><br>
        <input type="submit" value="修改">
    </form>
</body>
</html>
