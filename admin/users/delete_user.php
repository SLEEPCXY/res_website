<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // 获取传递过来的用户名
    $usernameToDelete = $_GET['UserName'];

    // 连接数据库
    include '../../database_config.php';

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 构建 SQL 查询语句并执行
    $sql = "DELETE FROM users WHERE UserName = '$usernameToDelete';";

    if ($conn->query($sql) === TRUE) {
        echo "成功删除记录";
        header("Location:../m_users.php");
    } else {
        echo "Error: " . $conn->error;
    }

    // 关闭连接
    $conn->close();
}
?>

