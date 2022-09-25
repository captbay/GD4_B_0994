<?php
session_start();
if (isset($_POST['tambah'])) {
    include('../db.php');
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $realese = $_POST['realese'];
    $season = $_POST['season'];
    $synopsis = $_POST['synopsis'];

    if($_POST["tambah"] == "add") {
        $query = "INSERT INTO movies (name, genre, realese, season, synopsis) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param('sssss', $name, $genre, $realese, $season, $synopsis);
        $stmt->execute();
        if ($stmt) { 
            echo
            '<script>
            alert("ADD Success");
            window.location = "../page/listMoviesPage.php"
            </script>';
        } else { 
            echo
            '<script>
            alert("ADD Failed");
            window.history.back()
            </script>';
        }
    }else{
        echo
        '<script>
        window.history.back()
        </script>';  
    }
} else { 
    echo
    '<script>
    window.history.back()
    </script>';
} 
?>