<?php
// 连接接到数据库
include '../../database_config.php';

// 检查是否接收到 POST 请求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 检查是否收到 delete_id
    if (isset($_POST['delete_id'])) {
        // 获取 delete_id 变量
        $delete_id = $_POST['delete_id'];

        // 删除 dishes 表中对应的记录
        $sql = "DELETE FROM dishes WHERE DishID = $delete_id";

        // 执行 SQL 查询
        if (mysqli_query($conn, $sql)) {
            echo "成功删除记录";
            header("Location:../m_dishes.php");
        } else {
            echo "删除记录时出现问题：" . mysqli_error($conn);
        }
    } else {
        echo "未收到 delete_id";
    }
}
?>
