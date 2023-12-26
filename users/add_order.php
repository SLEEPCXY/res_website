<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 从 POST 请求中获取表单数据
    $orderID = $_POST['OrderID'];
    $userID = $_POST['UserID'];
    $orderDate = $_POST['OrderDate'];
    $dishName = $_POST['DishName'];
    $quantity = $_POST['Quantity'];
    $unitPrice = $_POST['UnitPrice'];
    $totalAmount = $_POST['TotalAmount'] * $quantity;
    $orderStatus = $_POST['OrderStatus'];

    // 检查数量是否大于0
    if ($quantity <= 0) {
        echo "<script>alert('菜品的数量必须大于0'); window.location = document.referrer;</script>";
        exit; // 直接退出
    }

    // 连接数据库（请根据实际情况修改连接信息）
    include '../database_config.php'; // 假设你的数据库配置文件在这里

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 插入数据
    $sql = "INSERT INTO orders (OrderID, UserID, OrderDate, DishName, Quantity, UnitPrice, TotalAmount, OrderStatus)
    VALUES ('$orderID', '$userID', '$orderDate', '$dishName', '$quantity', '$unitPrice', '$totalAmount', '$orderStatus')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('下单成功~'); window.location = document.referrer;</script>";
        exit;
    } else {
        echo "<script>alert('出错了,请联系工作人员TAT'); window.location = document.referrer;</script>";
    }

    $conn->close();
}
?>
