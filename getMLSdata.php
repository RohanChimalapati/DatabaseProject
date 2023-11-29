<html>
<?php
    $pName = $_GET['PlayerName'];
    $pName2 = $_GET['PlayerName2'];
    

    $conn = new mysqli ("localhost", "root", "anmyancn1", "classproj1");
    $sql = "SELECT PlayerName, Team, Wins, Losses, Draws, Position, Goals, Assists, PK_taken, PK_made, Matches, Game_time, Yellow_cards, Red_cards
            FROM Player as P, Team as T
            WHERE PlayerName = ? AND P.Team = T.Name";

    if($insertStmt = $conn->prepare($sql)) {
        $insertStmt->bind_param("s", $pName);
        $insertStmt->execute();
    } 

    $insertStmt->bind_result($PlayerName, $Team, $W, $L, $T, $Position, $Goals, $Assists, $PK_taken, $PK_made, $Matches, $Game_time, $Yellow_cards, $Red_cards);
    echo $PlayerName;
    if($insertStmt->fetch() != null) {
        printf("Name: %s <br>Team: %s <br>Team Record: %s-%s-%s <br>Position: %s <br>Goals: %s <br>Assists: %s <br>Penalty Kicks Taken: %s <br>Penalty Kicks Made: %s <br> Matches: %s <br> Game Time: %s <br>Yellow Cards: %s <br>Red Cards: %s<br><br>", $PlayerName, $Team, $W, $T, $L, $Position, $Goals, $Assists, $PK_taken, $PK_made, $Matches, $Game_time, $Yellow_cards, $Red_cards);
    }
    else {
        printf("Error: Name not found");
    }
    
    $conn->close();
?>
<a href="dbProjSite.html">Return to Main Menu</a><br>
<a href="AddPlayer.html">Return to Get Player Info</a><br>
</html>