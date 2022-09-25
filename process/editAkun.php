<?php
session_start();
if (isset($_POST['edit']) && $_POST['edit'] == 'edit') {
    include('../db.php');

    $id = $_SESSION["user"]["id"];
    $name = $_POST['name'];
    $phonenum = $_POST['phonenum'];
    $email = $_POST['email'];

    $query = "UPDATE users SET name = ?, phonenum = ?, email = ? WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('sssi', $name, $phonenum, $email, $id);
    $stmt->execute();
    
    echo
        '<script>
        alert("Edit Success");
        window.history.back()
        </script>';
} else {
    echo
    '<script>
    window.history.back()
    </script>';
} ?>