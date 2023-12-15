<?php
// 检查是否有POST请求发送的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 数据库连接
    include '../../database_config.php';

    // 获取表单数据
    $OrderID = $_POST["OrderID"];
    $UserID = $_POST["UserID"];
    $OrderDate = $_POST["OrderDate"];
    $DishName = $_POST["DishName"];
    $Quantity = $_POST["Quantity"];
    $UnitPrice = $_POST["UnitPrice"];
    $TotalAmount = $_POST["TotalAmount"];
    $OrderStatus = $_POST["OrderStatus"];

    // 准备SQL语句
    $sql = "INSERT INTO orders (OrderID, UserID, OrderDate, DishName, Quantity, UnitPrice, TotalAmount, OrderStatus)
    VALUES ('$OrderID', '$UserID', '$OrderDate', '$DishName', '$Quantity', '$UnitPrice', '$TotalAmount', '$OrderStatus')";

    // 执行SQL语句并检查是否成功
    if ($conn->query($sql) === TRUE) {
        echo "订单添加成功";
        header("Location:../m_orders.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>
