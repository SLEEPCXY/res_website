<!-- 下单 -->
<!DOCTYPE html>
<html>
<head>
    <title>下单页面</title>
</head>
<body>
    <h2>菜品列表</h2>
    <table>
        <tr>
            <th>DishID</th>
            <th>DishName</th>
            <th>SellingPrice</th>
            <th>Quantity</th>
            <th>下单</th>
        </tr>
        <?php
        // 连接数据库
        include 'database_config.php'; // 假设你的数据库配置文件在这里

        // 查询 dishes 表中的数据
        $sql = "SELECT DishID, DishName, SellingPrice FROM dishes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["DishID"] . "</td>";
                echo "<td>" . $row["DishName"] . "</td>";
                echo "<td>" . $row["SellingPrice"] . "</td>";
                echo '<td><form method="post" action="./users/add_order.php">';
                echo '<input type="hidden" name="OrderID" value="' . rand(1000, 9999) . '">';
                echo '<input type="hidden" name="UserID" value="' . $_COOKIE["username"] . '">';
                echo '<input type="hidden" name="OrderDate" value="' . date("Y-m-d") . '">';
                echo '<input type="hidden" name="DishName" value="' . $row["DishName"] . '">';
                echo '<input type="number" name="Quantity" value="1">';
                echo '<input type="hidden" name="UnitPrice" value="' . $row["SellingPrice"] . '">';
                echo '<input type="hidden" name="TotalAmount" value="' . $row["SellingPrice"] . '">';
                echo '<input type="hidden" name="OrderStatus" value="0">';
                echo '<input type="submit" value="下单">';
                echo '</form></td>';
                echo "</tr>";
            }
        } else {
            echo "0 结果";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
