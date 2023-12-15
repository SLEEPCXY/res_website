<!-- 查看历史订单 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Orders</h2>
    <table>
        <tr>
            <th>OrderID</th>
            <th>UserID</th>
            <th>OrderDate</th>
            <th>DishName</th>
            <th>Quantity</th>
            <th>UnitPrice</th>
            <th>TotalAmount</th>
            <th>OrderStatus</th>
        </tr>

        <?php
        // 连接数据库
        include 'database_config.php';

        // 检查连接
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $username = $_COOKIE['username'];
        // 查询数据库
        $query = "SELECT OrderID, UserID, OrderDate, DishName, Quantity, UnitPrice, TotalAmount, OrderStatus FROM orders where UserID = '$username'";
        $result = mysqli_query($conn, $query);

        // 输出数据
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['OrderID']}</td>";
            echo "<td>{$row['UserID']}</td>";
            echo "<td>{$row['OrderDate']}</td>";
            echo "<td>{$row['DishName']}</td>";
            echo "<td>{$row['Quantity']}</td>";
            echo "<td>{$row['UnitPrice']}</td>";
            echo "<td>{$row['TotalAmount']}</td>";
            echo "<td>";
            if ($row['OrderStatus'] == 0) {
                echo "未出货";
            } elseif ($row['OrderStatus'] == 1) {
                echo "出货";
            } else {
                echo "未知";
            }
            echo "</td>";
            echo "</tr>";
        }


        // 关闭连接
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
