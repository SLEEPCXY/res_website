<!DOCTYPE html>
<html>
<head>
    <title>管理菜品</title>
</head>
<body>

<h1>管理菜品</h1>

<table border="1">
    <tr>
        <th>菜品编号</th>
        <th>菜品名称</th>
        <th>售价</th>
        <th>操作</th>
    </tr>

    <?php
    // PHP代码从数据库中检索并显示菜品

    // 连接数据库
    include '../database_config.php';

    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 从数据库选择数据
    $sql = "SELECT DishID, DishName, SellingPrice FROM dishes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["DishID"] . "</td><td>" . $row["DishName"] . "</td><td>" . $row["SellingPrice"] . "</td>";
            echo "<td><form method='post' action='./dishes/delete_dish.php'><input type='hidden' name='delete_id' value='" . $row["DishID"] . "'><input type='submit' value='删除'></form></td></tr>";
        }
    } else {
        echo "<tr><td colspan='4'>未找到菜品</td></tr>";
    }
    ?>

</table>

<h2>添加新菜品</h2>
<form method="post" action="./dishes/add_dish.php">
    菜品编号: <input type="text" name="dish_id"><br>
    菜品名称: <input type="text" name="dish_name"><br>
    售价: <input type="text" name="selling_price"><br>
    <input type="submit" value="添加">
</form>

<h2>修改现有菜品</h2>
<form method="post" action="./dishes/modify_dish.php">
    菜品编号: <input type="text" name="modify_id"><br>
    菜品名称: <input type="text" name="modify_name"><br>
    售价: <input type="text" name="modify_price"><br>
    <input type="submit" value="修改">
</form>

</body>
</html>
