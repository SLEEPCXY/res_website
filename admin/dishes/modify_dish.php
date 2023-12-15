<?php
// 检查是否收到了 POST 请求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取通过 POST 请求发送的变量
    $modify_id = $_POST['modify_id'];
    $modify_name = $_POST['modify_name'];
    $modify_price = $_POST['modify_price'];

    // 连接到数据库
    include '../../database_config.php';

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 准备更新数据的 SQL 语句
    $sql = "UPDATE Dishes SET DishName='$modify_name', SellingPrice='$modify_price' WHERE DishID='$modify_id';";

    // 执行 SQL 语句
    if ($conn->query($sql) === TRUE) {
        echo "记录更新成功";
        header("Location:../m_dishes.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
