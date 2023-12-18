<!DOCTYPE html>
<html>
<head>
    <title>Modify personal information</title>
    <link rel="stylesheet" type="text/css" href="Style/headline.css">

    <style>
        .header {
            background-color: #f0f0f0;
        }

        .content {
            background-color: #f8f8f8;
        }

        div.grid-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        div.grid-item {
            width: 48%;
            box-sizing: border-box;
            padding: 10px;
            text-align: center;
            margin: 4%;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }


        div.grid-item img {
            max-width: 100%;
        }

        div.grid-item p:first-child {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0 0 10px;
        }

        div.grid-item p:last-child {
            font-size: 1.1rem;
            margin: 0 0 5px;
        }

        div.grid-item form {
            margin-top: 10px;
        }

        div.grid-item input[type="number"] {
            width: 30px;
        }

        div.grid-item input[type="submit"] {
            margin-top: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        div.grid-item input[type="submit"]:hover {
            background-color: #0062cc;
        }

        table.grid-container {
            border-collapse: collapse;
        }

        table.grid-container td {
            padding: 40px;
        }

        tr.grid-row {
            border: 1px solid #ddd;
        }
    </style>


</head>
<body>
<div class="header">
    <p class="welcome"><a href="common_user.html">Welcome</a></p>
    <ul>
        <li><a href="users_pernal.php">Modify personal information</a></li>
        <li><a href="users_do_order.php">Place an order</a></li>
        <li><a href="users_history_orders.php">View historical orders</a></li>
    </ul>
</div>

<div class="content">
    <?php
    // 连接数据库，假设使用 MySQLi 扩展
    include 'database_config.php';

    // 检查连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 获取用户输入的用户名
    $username = $_COOKIE["username"];

    // 查询数据库获取地址和电话号码
    $sql = "SELECT Address, PhoneNumber FROM users WHERE UserName = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 输出用户信息
        while ($row = $result->fetch_assoc()) {
            echo "<p>Address: " . $row["Address"] . "</p>";
            //echo "<p>PhoneNumber: " . $row["PhoneNumber"]. "</p>";
        }
    } else {
        echo "Address Not Found";
    }
    ?>

    <h2>Today Menu</h2>
    <table class="grid-container">
        <?php
        include 'database_config.php';

        $sql = "SELECT DishID, DishName, SellingPrice FROM dishes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $count = 0; // 计数器用于检查单元格数量

            while ($row = $result->fetch_assoc()) {
                if ($count % 2 == 0) {
                    echo "<tr class='grid-row'>";
                }

                echo "<td class='grid-item'>";
                echo "<img src='Image/food.jpg' alt='Default Image' style='width: 200px; height: 200px;'>";
                echo "<div>";
                echo "<p>" . $row["DishName"] . "</p>";
                echo "<p>Price: $" . $row["SellingPrice"] . "</p>";
                echo '<form method="post" action="./users/add_order.php">';
                echo '<input type="hidden" name="OrderID" value="' . rand(1000, 9999) . '">';
                echo '<input type="hidden" name="UserID" value="' . $_COOKIE["username"] . '">';
                echo '<input type="hidden" name="OrderDate" value="' . date("Y-m-d") . '">';
                echo '<input type="hidden" name="DishName" value="' . $row["DishName"] . '">';
                echo '<input type="number" name="Quantity" value="1">';
                echo '<input type="hidden" name="UnitPrice" value="' . $row["SellingPrice"] . '">';
                echo '<input type="hidden" name="TotalAmount" value="' . $row["SellingPrice"] . '">';
                echo '<input type="hidden" name="OrderStatus" value="0">';
                echo '<input type="submit" value="下单">';
                echo "</form>";
                echo "</div>";
                echo "</td>";

                $count++;

                if ($count % 2 == 0) {
                    echo "</tr>";
                }
            }

            // 检查最后一行是否有未关闭的标签
            if ($count % 2 != 0) {
                echo "<td class='grid-item'></td>"; // 添加一个空单元格占位
                echo "</tr>";
            }
        } else {
            echo "There has not Menu Now, Wait plz";
        }

        $conn->close();
        ?>
    </table>

</div>

</body>
</html>
