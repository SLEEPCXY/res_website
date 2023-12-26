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
        <div id="content" class="clearfix">
        <div id = 'Add'>
            <!-- 添加表单 -->
            <h3>增加库存</h3>
            <form method="post" action="./inventory/add.php">
                <!-- User ID: <input type="text" name="UserID"><br> -->
                Dish ID: <input type="text" name="DishID"><br>
                Current Stock: <input type="text" name="CurrentStock"><br>
                Purchase Price: <input type="text" name="PurchasePrice"><br>
                Selling Price: <input type="text" name="SellingPrice"><br>
                <input type="submit" value="Add">
            </form>
        </div>

            <br>

        <div id = 'Change'>
            <!-- 修改表单 -->
            <h3>修改库存</h3>
            <form method="post" action="./inventory/modify.php">
                Dish ID: <input type="text" name="modify_id"><br>
                User ID: <input type="text" name="modify_user_id"><br>
                Current Stock: <input type="text" name="modify_stock"><br>
                Purchase Price: <input type="text" name="modify_purchase_price"><br>
                Selling Price: <input type="text" name="modify_selling_price"><br>
                <input type="submit" value="Modify">
            </form>
        </div>

        <br>
    
        <div id = 'Table'>
        <h2>Dish Inventory</h2>
            <?php
            // 连接到数据库
            include '../database_config.php';

            // 检查连接是否成功
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }

            // 获取数据库中的数据
            $sql = "SELECT InventoryID, DishID, CurrentStock, PurchasePrice, SellingPrice FROM dishinventory";
            $result = $conn->query($sql);

            // 输出表格及删除按钮
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Inventory ID</th><th>Dish ID</th><th>Current Stock</th><th>Purchase Price</th><th>Selling Price</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['InventoryID'] . "</td>";
                    echo "<td>" . $row['DishID'] . "</td>";
                    echo "<td>" . $row['CurrentStock'] . "</td>";
                    echo "<td>" . $row['PurchasePrice'] . "</td>";
                    echo "<td>" . $row['SellingPrice'] . "</td>";
                    echo "<td><form method='post' action=' ./inventory/delete.php'>
                            <input type='hidden' name='delete_id' value='" . $row['DishID'] . "'>
                            <input type='submit' value='Delete'>
                        </form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 结果";
            }
            ?>
        </div>

    </body>
</html>