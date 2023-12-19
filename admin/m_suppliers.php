<!DOCTYPE html>
<html>
<head>
    <title>管理供应商</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>供应商信息</h2>
    <?php
    // 数据库连接
    include '../database_config.php';

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 查询供应商信息
    $sql = "SELECT * FROM Suppliers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>SupplierID</th><th>Brand</th><th>SupplierName</th><th>Contact</th><th>ContactPhoneNumber</th><th>Address</th><th>操作</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["SupplierID"]."</td><td>".$row["Brand"]."</td><td>".$row["SupplierName"]."</td><td>".$row["Contact"]."</td><td>".$row["ContactPhoneNumber"]."</td><td>".$row["Address"]."</td><td><form method='post' action='./suppliers/delete_supplier.php'><input type='hidden' name='delete_id' value='".$row["SupplierID"]."'><input type='submit' value='删除'></form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 结果";
    }

    ?>
    
    <h2>添加供应商</h2>
    <form method="post" action="add_supplier.php">
        SupplierID: <input type="text" name="SupplierID"><br>
        Brand: <input type="text" name="Brand"><br>
        SupplierName: <input type="text" name="SupplierName"><br>
        Contact: <input type="text" name="Contact"><br>
        ContactPhoneNumber: <input type="text" name="ContactPhoneNumber"><br>
        Address: <input type="text" name="Address"><br>
        <input type="submit" value="添加">
    </form>

    <h2>修改供应商信息</h2>
    <form method="post" action="update_supplier.php">
        SupplierID: <input type="text" name="SupplierID"><br>
        Brand: <input type="text" name="Brand"><br>
        SupplierName: <input type="text" name="SupplierName"><br>
        Contact: <input type="text" name="Contact"><br>
        ContactPhoneNumber: <input type="text" name="ContactPhoneNumber"><br>
        Address: <input type="text" name="Address"><br>
        <input type="submit" value="修改">
    </form>
</body>
</html>
