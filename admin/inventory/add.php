<?php
// 数据库连接
include '../../database_config.php';

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 从 POST 请求中获取相关变量
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$UserID = $_POST['UserID'];
    $UserID = rand();
    $DishID = $_POST['DishID'];
    $CurrentStock = $_POST['CurrentStock'];
    $PurchasePrice = $_POST['PurchasePrice'];
    $SellingPrice = $_POST['SellingPrice'];

    // 构建 SQL 插入语句
    $sql = "INSERT INTO dishinventory (UserID, DishID, CurrentStock, PurchasePrice, SellingPrice)
    VALUES ('$UserID', '$DishID', '$CurrentStock', '$PurchasePrice', '$SellingPrice');";

    // 执行插入操作
    if ($conn->query($sql) === TRUE) {
        echo "新记录插入成功";
        header("Location:../m_inventory.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
