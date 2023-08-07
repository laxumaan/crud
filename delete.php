<?php
include "config.php";

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete the user record from the database
    $deleteSql = "DELETE FROM users WHERE id='$user_id'";
    $deleteResult = $conn->query($deleteSql);

    if ($deleteResult === TRUE) {
        // You can also delete associated data from other tables if needed

        echo "User and their data deleted successfully.";
    } else {
        echo "Error: " . $deleteSql . "<br>" . $conn->error;
    }
}