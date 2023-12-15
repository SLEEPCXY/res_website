<?php
// 检查是否收到了 POST 请求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取 POST 数据
    $admin_id = $_POST["admin_id"];
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    // 连接到数据库
    include '../database_config.php';

    // 检查连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 更新管理员表中的数据
    $sql = "UPDATE administrators SET AdminUserName='$admin_username', AdminPassword='$admin_password' WHERE AdminID=$admin_id";

    if ($conn->query($sql) === TRUE) {
        echo "管理员信息更新成功";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
