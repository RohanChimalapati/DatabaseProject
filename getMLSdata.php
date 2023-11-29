
<?php
    $pName = $_GET['PlayerName'];
    $pName2 = $_GET['PlayerName2'];
    

    $conn = new mysqli ("localhost", "root", "anmyancn1", "classproj1");
    $sql = "SELECT PlayerName, Team, Wins, Losses, Draws, Position, Goals, Assists, PK_taken, PK_made, Game_time, Yellow_cards, Red_cards
            FROM Player as P, Team as T
            WHERE PlayerName = ? AND P.Team = T.Name";

    if($insertStmt = $conn->prepare($sql)) {
        $insertStmt->bind_param("s", $pName);
        $insertStmt->execute();
    } 

    $insertStmt->bind_result($PlayerName, $Team, $W, $L, $T, $Position, $Goals, $Assists, $PK_taken, $PK_made, $Game_time, $Yellow_cards, $Red_cards);
    echo $PlayerName;
    if($insertStmt->fetch() != null) {
        printf("Name: %s <br>Team: %s <br>Position: %s <br>Goals: %s <br>Assists: %s <br>Penalty Kicks Taken: %s <br>Penalty Kicks Made: %s <br>Game Time: %s <br>Yellow Cards: %s <br>Red Cards: %s<br><br>", $PlayerName, $Team, $Position, $Goals, $Assists, $PK_taken, $PK_made, $Game_time, $Yellow_cards, $Red_cards);
    }
    else {
        printf("Error: Name not found");
    }
    
    $conn->close();
?>