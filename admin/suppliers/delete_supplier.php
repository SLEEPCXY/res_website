<?php
// 数据库连接信息
include '../../database_config.php';

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 接收要删除的 SupplierID
$delete_id = $_POST['delete_id'];

// 删除记录的 SQL 语句
$sql = "DELETE FROM suppliers WHERE SupplierID = '$delete_id';";

// 执行 SQL
if ($conn->query($sql) === TRUE) {
    echo "记录删除成功";
    header("Location:../m_suppliers.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
