<?php
// 数据库连接
include '../../database_config.php';

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 从 POST 请求中获取 delete_id
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_id = $_POST['OrderID'];

    // 构建 SQL 删除语句
    $sql = "DELETE FROM orders WHERE OrderID='$OrderID'";

    // 执行删除操作
    if ($conn->query($sql) === TRUE) {
        echo "记录删除成功";
        header("Location:../m_orders.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
