<?php
    $playerName = $_GET['PlayerName'] ?? null;
    $ID = $_GET['PlayerID'] ?? null;
    $teamName = $_GET['Team'] ?? null;
    $position = $_GET['Position'] ?? null;
    $matches = $_GET['Matches'] ?? null;
    $minutes = $_GET['Game_Time'] ?? null;
    $goals = $_GET['Goals'] ?? null;
    $assists = $_GET['Assists'] ?? null;
    $pkMade = $_GET['PK_Made'] ?? null;
    $pkAtt = $_GET['PK_taken'] ?? null;
    $yellowCards = $_GET['Yellow_Cards'] ?? null;
    $RedCards = $_GET['Red_Cards'] ?? null;

    $conn = new mysqli ("localhost", "root", "anmyancn1", "classproj1");
    $sql = "INSERT INTO Player(PlayerName, PlayerID, Team, Position, Matches, Game_Time, Goals, Assists, PK_Made, PK_taken, Yellow_Cards, Red_Cards)
            VALUES('$playerName', '$ID', '$teamName', '$position', $matches, $minutes, $goals, $assists, $pkMade, $pkAtt, $yellowCards, $RedCards);";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Player Added');</script>"; 
    }
    else{
        echo "<script>alert('Error: Player Not Added');</script>"; 
    }

    $conn->close();
?>
