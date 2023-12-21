<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel = "stylesheet" type = "text/css" href="../Style/sidebar.css">
    <link rel = "stylesheet" type = "text/css" href="../Style/ACT.css">
    <style>
    body {
        display: flex;
        margin: 0;
        height: 100vh; /* 将body的高度设置为100vh */
        background-color: #f2f2f2;
    }
    </style>
</head>
<body>
    <div id="sidebar">
        <h2><a href="../Administrator.html" style="color: #fff; text-decoration: none;">Management page</a></h2>
        <hr>
        <ul>
            <li><a href="../admin/m_users.php">Manage Users</a></li>
            <li><a href="../admin/m_orders.php">Manage Orders</a></li>
            <li><a href="../admin/m_dishes.php">Manage Dishes</a></li>
            <li><a href="../admin/m_inventory.php">Manage Inventory</a></li>
            <li><a href="../admin/m_suppliers.php">Manage Suppliers</a></li>
            <li><a href="../admin/m_admin.php">Manage Personal Messages</a></li>
        </ul>
    </div>

    
    <div id="content" class="clearfix">
        <div id = 'Add'>
            <h2>添加用户</h2>
            <form action="./users/add_user.php" method="post">
                UserName: <input type="text" name="UserName"><br>
                Password: <input type="password" name="Password"><br>
                Address: <input type="text" name="Address"><br>
                PhoneNumber: <input type="text" name="PhoneNumber"><br>
                <input type="submit" value="添加">
            </form>
        </div>

            <br>

        <div id = 'Change'>
            <h2>修改用户</h2>
            <form action="./users/update_user.php" method="post">
                UserName: <input type="text" name="UserName"><br>
                Password: <input type="password" name="Password"><br>
                Address: <input type="text" name="Address"><br>
                PhoneNumber: <input type="text" name="PhoneNumber"><br>
                <input type="submit" value="修改">
            </form>
        </div>

        <br>
    
        <div id = 'Table'>
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
        </div>

    </div>
    
</body>
</html>
