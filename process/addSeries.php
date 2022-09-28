<?php
session_start();
if (isset($_POST['tambah'])) {
    include('../db.php');
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $realease = $_POST['realease'];
    $episode = $_POST['episode'];
    $season = $_POST['season'];
    $synopsis = $_POST['synopsis'];

    if($_POST["tambah"] == "add") {
        $query = "INSERT INTO series (name, genre, realease, episode, season, synopsis) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ssssss', $name, $genre, $realease, $episode, $season, $synopsis);
        $stmt->execute();
        if ($stmt) { 
            echo
            '<script>
            alert("ADD Success");
            window.location = "../page/listSeriesPage.php"
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