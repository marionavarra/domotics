<?php
require "connessione.php";
//GET PARAMETER
$apri_tunnel = filter_input(INPUT_GET,"attiva_tunnel",FILTER_SANITIZE_STRING);
$attiva_teamviewer = filter_input(INPUT_GET,"apri_teamviewer",FILTER_SANITIZE_STRING);
$date= date("Y-m-d");
$time=date("H:i:s");
$ora= date('Y-m-d H:i:s');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br/>";
echo "Tunnel ";
echo $apri_tunnel;
echo "<br/>Teamviewer ";
echo $attiva_teamviewer;

$sql = "UPDATE azioni SET apri_tunnel=".$apri_tunnel.", attiva_teamviewer=".$attiva_teamviewer.", ora=NOW()  WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "<br/>Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<p><a href="./">Indice</a></p>
