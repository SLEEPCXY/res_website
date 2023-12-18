<?php
include '../database_config.php';

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

$delete_id = $_POST['Order_ID']

$sql = "DELETE FROM orders where OrderID = '$delete_id' and OrderStatus = 0;";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('订单已成功删除');</script>";
    header("Location:../users_history_orders.php");
} else {
    echo "<script>alert('订单已出货，无法删除');</script>";
    header("Location:../users_history_orders.php");
}

$conn->close();
?>