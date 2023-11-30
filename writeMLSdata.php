
<?php
    $pName = $_GET['PlayerName'] ?? null;
    $Time = $_GET['Game_time'] ?? null;

    $conn = new mysqli ("localhost", "root", "", "MLS");
    $sql = "Update Player
            set Game_time = $Time
            WHERE PlayerName = '$pName'";


    if ($conn->query($sql) === TRUE) {
        printf("Record updated");
    }
    else{
        printf("Error");
    }

    $conn->close();
?>