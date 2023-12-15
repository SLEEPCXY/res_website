<?php
// 数据库连接信息
include '../../database_config.php';

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 接收表单数据
$SupplierID = $_POST['SupplierID'];
$Brand = $_POST['Brand'];
$SupplierName = $_POST['SupplierName'];
$Contact = $_POST['Contact'];
$ContactPhoneNumber = $_POST['ContactPhoneNumber'];
$Address = $_POST['Address'];

// 添加记录的 SQL 语句
$sql = "INSERT INTO suppliers (SupplierID, Brand, SupplierName, Contact, ContactPhoneNumber, PAddress) 
VALUES ('$SupplierID', '$Brand', '$SupplierName', '$Contact', '$ContactPhoneNumber', '$Address')";

// 执行 SQL
if ($conn->query($sql) === TRUE) {
    echo "记录添加成功";
    header("Location:../m_suppliers.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
