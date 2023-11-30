
<?php
    $pName = $_GET['PlayerName'];
    

    $conn = new mysqli ("localhost", "root", "anmyancn1", "classproj1");
    $sql = "SELECT PlayerID, Team, Position, Matches, Game_Time, Goals, Assists, PK_Made, PK_taken, Yellow_Cards, Red_Cards
            FROM Player as P, Team as T
            WHERE PlayerName = ? AND P.Team = T.Name";

    if($insertStmt = $conn->prepare($sql)) {
        $insertStmt->bind_param("s", $pName);
        $insertStmt->execute();
    } 

    $insertStmt->bind_result($PlayerID, $Team, $Position, $Matches, $Game_time, $Goals, $Assists, $PK_made, $PK_taken, $Yellow_cards, $Red_cards);
    
    
    if($insertStmt->fetch() != null) {
        $res = array($PlayerID, $Team, $Position, $Matches, $Game_time, $Goals, $Assists, $PK_made, $PK_taken, $Yellow_cards, $Red_cards);
        // printf("Name: %s <br>Team: %s <br>Position: %s <br>Goals: %s <br>Assists: %s <br>Penalty Kicks Taken: %s <br>Penalty Kicks Made: %s <br>Game Time: %s <br>Yellow Cards: %s <br>Red Cards: %s<br><br>", $PlayerName, $Team, $Position, $Goals, $Assists, $PK_taken, $PK_made, $Game_time, $Yellow_cards, $Red_cards);
    }
    else {
        $res = "Error: PLAYER NOT FOUND";
    }
    
    echo json_encode($res);
    $conn->close();
?>