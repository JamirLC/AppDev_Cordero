<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: gray;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <h1>List</h1>
            <hr>
        </div> <!--header-->

        <?php
        include "D:\VSCODE\AppDev_Cordero\act1\database.php";
        $action = isset($_GET['action']) ? $_GET['action'] : "";
        if ($action == "deleted") {
            echo "Deleted";
        }
        $query = "SELECT ID, name, description, price, quantity, created_at, update_at FROM products ORDER BY ID DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();

        echo "<a href='create.php' style='border: 1px solid black;'>Create</a>";



        if ($num > 0) {
            echo "<table>";
            echo "<tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>      
                    </tr>";

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                extract($row);
                echo "<tr>
                        <td>{$ID}</td>
                        <td>{$name}</td>
                        <td>{$description}</td>
                        <td>{$price}</td>
                        <td>{$quantity}</td>
                        <td>{$created_at}</td>
                        <td>{$update_at}</td>";

                echo "<td>";
                echo "<a href='update.php?id={$ID}'>Edit</a>";
                echo "<hr>";
                echo "<a href='delete.php?id={$ID}'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
        ?>

    </div> <!--main container-->
</body>

</html>