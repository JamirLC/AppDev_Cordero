<?php
include 'D:\VSCODE\AppDev_Cordero\act1\database.php';
try {
    $id = isset($_GET["id"]) ? $_GET["id"] : die("ERROR: Invalid");

    $query = "DELETE FROM products WHERE id= ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);

    if ($stmt->execute()) {
        header("Location: index.php?action=Deleted");
        echo "Record deleted successfully";
    } else {
        die('Unable to delete. Please try again');
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
