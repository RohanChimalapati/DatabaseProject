
<?php
    $pName = $_GET['PlayerName'] ?? null;
    $Time = $_GET['Game_time'] ?? null;

    $conn = new mysqli ("localhost", "root", "anmyancn1", "classproj1");
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