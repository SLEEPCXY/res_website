<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 从 POST 请求中获取表单数据
    $userName = $_POST['UserName'];
    $password = $_POST['Password'];
    $address = $_POST['Address'];
    $phoneNumber = $_POST['PhoneNumber'];
    echo 123;
    // 连接数据库（请根据实际情况修改连接信息）
    include '../database_config.php';
    echo 123;
    // 检查连接是否成功
    if ($conn->connect_error) {
        echo 123;
        die("连接失败: " . $conn->connect_error);
    }

    // 更新数据
    $sql = "UPDATE users SET Address='$address', PhoneNumber='$phoneNumber' WHERE UserName='$userName' and Password = '$password';";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("记录更新成功");</script>';
        header("Location:../common_user.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
