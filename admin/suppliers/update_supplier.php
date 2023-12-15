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

// 更新记录的 SQL 语句
$sql = "UPDATE suppliers SET Brand='$Brand', SupplierName='$SupplierName', ContactPerson='$Contact', ContactPhoneNumber='$ContactPhoneNumber', PAddress='$Address' WHERE SupplierID='$SupplierID'";

// 执行 SQL
if ($conn->query($sql) === TRUE) {
    echo "记录更新成功";
    header("Location:../m_suppliers.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
