
<?php
    $pName = $_GET['PlayerName'];
    $pID = $_GET['ID'];
    

    $conn = new mysqli ("localhost", "root", "anmyancn1", "classproj1");
    $sql = "DELETE FROM Player
            WHERE PlayerName = '$pName' OR PlayerID = '$pID';";

    $sql2 = "SELECT PlayerID FROM Player
            WHERE PlayerName = '$pName' OR PlayerID = '$pID';";

    if (!(is_null($conn->query($sql2)))) {
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Player Deleted');</script>"; 
        }
    }
    else{
        echo "<script>alert('Error: Player Not Found');</script>"; 
    }

    $conn->close();
?>