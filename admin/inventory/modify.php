


<?php
// 数据库连接
include '../../database_config.php';

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 从 POST 请求中获取相关变量
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modify_user_id = $_POST['modify_user_id'];
    $modify_id = $_POST['modify_id'];
    $modify_stock = $_POST['modify_stock'];
    $modify_purchase_price = $_POST['modify_purchase_price'];
    $modify_selling_price = $_POST['modify_selling_price'];

    // 构建 SQL 更新语句
    $sql = "UPDATE dishinventory SET UserID='$modify_user_id', CurrentStock='$modify_stock', PurchasePrice='$modify_purchase_price', SellingPrice='$modify_selling_price' WHERE DishID='$modify_id'";

    // 执行更新操作
    if ($conn->query($sql) === TRUE) {
        echo "记录更新成功";
        header("Location:../m_inventory.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
?>
