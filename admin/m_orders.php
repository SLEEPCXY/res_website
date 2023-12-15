<!DOCTYPE html>
<html>
<head>
    <title>订单管理</title>
</head>
<body>

<?php
// 数据库连接
include '../database_config.php';

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 查询orders表中的数据
$sql = "SELECT OrderID, UserID, OrderDate, DishName, Quantity, UnitPrice, TotalAmount, OrderStatus FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>OrderID</th>
    <th>UserID</th>
    <th>OrderDate</th>
    <th>DishName</th>
    <th>Quantity</th>
    <th>UnitPrice</th>
    <th>TotalAmount</th>
    <th>OrderStatus</th>
    <th>Action</th>
    </tr>";

    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["OrderID"]."</td>
        <td>".$row["UserNaUserIDme"]."</td>
        <td>".$row["OrderDate"]."</td>
        <td>".$row["DishName"]."</td>
        <td>".$row["Quantity"]."</td>
        <td>".$row["UnitPrice"]."</td>
        <td>".$row["TotalAmount"]."</td>
        <td>".$row["OrderStatus"]."</td>
        <td><a href='./orders/delete_order.php?id=".$row["OrderID"]."'>删除</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 结果";
}

?>

<form action="add_order.php" method="post">
    <h3>添加订单：</h3>
    OrderID: <input type="text" name="OrderID"><br>
    UserUserIDName: <input type="text" name="UserID"><br>
    OrderDate: <input type="text" name="OrderDate"><br>
    DishName: <input type="text" name="DishName"><br>
    Quantity: <input type="text" name="Quantity"><br>
    UnitPrice: <input type="text" name="UnitPrice"><br>
    TotalAmount: <input type="text" name="TotalAmount"><br>
    OrderStatus: <input type="text" name="OrderStatus"><br>
    <input type="submit" value="添加">
</form>

<form action="update_order.php" method="post">
    <h3>修改订单：</h3>
    OrderID: <input type="text" name="OrderID"><br>
    UserID: <input type="text" name="UserID"><br>
    OrderDate: <input type="text" name="OrderDate"><br>
    DishName: <input type="text" name="DishName"><br>
    Quantity: <input type="text" name="Quantity"><br>
    UnitPrice: <input type="text" name="UnitPrice"><br>
    TotalAmount: <input type="text" name="TotalAmount"><br>
    OrderStatus: <input type="text" name="OrderStatus"><br>
    <input type="submit" value="修改">
</form>

</body>
</html>
