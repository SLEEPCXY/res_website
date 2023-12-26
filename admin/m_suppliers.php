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
            <h2>添加供应</h2>
            <form method="post" action="./suppliers/add_supplier.php">
                SupplierID: <input type="text" name="SupplierID"><br>
                Brand: <input type="text" name="Brand"><br>
                SupplierName: <input type="text" name="SupplierName"><br>
                Contact: <input type="text" name="Contact"><br>
                ContactPhoneNumber: <input type="text" name="ContactPhoneNumber"><br>
                Address: <input type="text" name="Address"><br>
                <input type="submit" value="添加">
            </form>
        </div>

            <br>

        <div id = 'Change'>
            <h2>修改供应</h2>
            <form method="post" action="./suppliers/update_supplier.php">
                SupplierID: <input type="text" name="SupplierID"><br>
                Brand: <input type="text" name="Brand"><br>
                SupplierName: <input type="text" name="SupplierName"><br>
                Contact: <input type="text" name="Contact"><br>
                ContactPhoneNumber: <input type="text" name="ContactPhoneNumber"><br>
                Address: <input type="text" name="Address"><br>
                <input type="submit" value="修改">
            </form>
        </div>

        <br>
    
        <div id = 'Table'>
        <h2>供应商信息</h2>
            <?php
            // 数据库连接
            include '../database_config.php';

            // 查询供应商信息
            $sql = "SELECT * FROM Suppliers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                if ($result->num_rows > 0) {
                    echo "<table><tr><th>SupplierID</th><th>Brand</th><th>SupplierName</th><th>Contact</th><th>ContactPhoneNumber</th><th>Address</th><th>操作</th></tr>";
                    while($row = $result->fetch_assoc()) 
                    {
                        echo "<tr><td>".$row["SupplierID"]."</td><td>".
                        $row["Brand"]."</td><td>".$row["SupplierName"]."</td><td>".
                        $row["Contact"]."</td><td>".$row["ContactPhoneNumber"]."</td><td>".
                        $row["PAddress"]."</td><td><form method='post' action='./suppliers/delete_supplier.php'><input type='hidden' name='delete_id' value='"
                        .$row["SupplierID"]."'><input type='submit' value='删除'></form></td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 结果";
                }
            }
            ?>
        </div>
    </body>
</html>