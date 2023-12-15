<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dish Inventory Management</title>
    <style>
        /* 样式设计可以根据需要进行修改 */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>Dish Inventory</h2>

    <?php
    // 连接到数据库
    include '../database_config.php';

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 获取数据库中的数据
    $sql = "SELECT UserID, DishID, CurrentStock, PurchasePrice, SellingPrice FROM dishinventory";
    $result = $conn->query($sql);

    // 输出表格及删除按钮
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>User ID</th><th>Dish ID</th><th>Current Stock</th><th>Purchase Price</th><th>Selling Price</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['UserID'] . "</td>";
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

    <!-- 添加表单 -->
    <h3>Add Inventory</h3>
    <form method="post" action="./inventory/add.php">
        User ID: <input type="text" name="UserID"><br>
        Dish ID: <input type="text" name="DishID"><br>
        Current Stock: <input type="text" name="CurrentStock"><br>
        Purchase Price: <input type="text" name="PurchasePrice"><br>
        Selling Price: <input type="text" name="SellingPrice"><br>
        <input type="submit" value="Add">
    </form>

    <!-- 修改表单 -->
    <h3>Modify Inventory</h3>
    <form method="post" action="./inventory/modify.php">
        Dish ID: <input type="text" name="modify_id"><br>
        User ID: <input type="text" name="modify_user_id"><br>
        Current Stock: <input type="text" name="modify_stock"><br>
        Purchase Price: <input type="text" name="modify_purchase_price"><br>
        Selling Price: <input type="text" name="modify_selling_price"><br>
        <input type="submit" value="Modify">
    </form>
</body>

</html>
