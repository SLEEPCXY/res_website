<!DOCTYPE html>
<html>
<head>
    <title>Manage Admin Messages</title>
    <link rel = "stylesheet" type = "text/css" href="../Style/sidebar.css">
    <style>
        body {
            display: flex;
            margin: 0;
            height: 100vh; /* 将body的高度设置为100vh */
            background-color: #f2f2f2;
        }

        #content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column; /* 添加此行 */
            justify-content: center;
            align-items: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 10px;
        }

        img {
            border: 2px solid black;
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

    
    <div id="content">
        <h2>管理员信息管理</h2>
        
        <?php
        // 连接到数据库
        include '../database_config.php';

        // 检查连接
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }

        // 查询管理员表中的数据
        $sql = "SELECT AdminID, AdminUserName, AdminPassword FROM administrators";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // 输出数据到 HTML 表格
            echo "<table border='1'>
                    <tr>
                        <th>AdminID</th>
                        <th>AdminUserName</th>
                        <th>AdminPassword</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["AdminID"]."</td>
                        <td>".$row["AdminUserName"]."</td>
                        <td>".$row["AdminPassword"]."</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "0 结果";
        }
        ?>

        <h3>修改管理员信息</h3>
        <form action="update_admin.php" method="post">
            <label for="admin_id">AdminID(ID不可更改):</label><br>
            <input type="text" id="admin_id" name="admin_id"><br>
            <label for="admin_username">Admin用户名:</label><br>
            <input type="text" id="admin_username" name="admin_username"><br>
            <label for="admin_password">Admin密码:</label><br>
            <input type="text" id="admin_password" name="admin_password"><br><br>
            <input type="submit" value="修改">
        </form>
    </div>
    
</body>
</html>
