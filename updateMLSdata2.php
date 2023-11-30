<html>
<?php
    $playerName = $_GET['PlayerName'];
    $ID = $_GET['ID'];
    $teamName = $_GET['Team'];
    $position = $_GET['Position'];
    $matches = $_GET['Matches'] ?? null;
    $minutes = $_GET['Minutes'] ?? null;
    $goals = $_GET['Goals'] ?? null;
    $assists = $_GET['Assists'] ?? null;
    $pkMade = $_GET['PK_Made'] ?? null;
    $pkAtt = $_GET['PK_Attempted'] ?? null;
    $yellowCards = $_GET['Yellow_Cards'] ?? null;
    $redCards = $_GET['Red_Cards'] ?? null;

    $conn = new mysqli ("localhost", "root", "", "MLS");
    $sql = "UPDATE PLAYER
            SET Position = '$position',
                Team = '$teamName',
                Matches = $matches,
                Game_Time = $minutes,
                Goals = $goals,
                Assists = $assists,
                PK_Made = $pkMade,
                PK_Taken = $pkAtt,
                Yellow_Cards = $yellowCards,
                Red_Cards = $redCards
            WHERE PlayerName = '$playerName';";



if ($conn->query($sql) === TRUE) {
echo "<script>alert('Player Updated');</script>"; 
}
else{
echo "<script>alert('Error: Player Not Found');</script>"; 
}
    $conn->close();
?>
<a href="dbProjSite.html">Return to Main Menu</a><br>
<a href="UpdatePlayer.html">Return to Update Player</a><br>
</html>