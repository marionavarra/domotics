<?php
  require "connessione.php";
  $teamviewer = $_GET['teamviewer_attivato'];   
  $dropbox = $_GET['stato_dropbox'];    
  $motion = $_GET['motion_attivato'];  
  $tunnel = $_GET['tunnel_aperto'];
  $cpu = $_GET['stato_cpu'];
  $power = $_GET['stato_power'];
  $mem = $_GET['stato_mem'];
  $temp = $_GET['stato_temp'];
  
 
if ($teamviewer == "false")
  $teamviewer = 0;
  
else
  $teamviewer = 1;

if ($motion == "false")
  $motion = 0;
  
else
  $motion = 1;


if ($tunnel == "false")
  $tunnel = 0;
else
  $tunnel = 1;

  $sql1 = "UPDATE stato SET tunnel=".$tunnel.", teamviewer=".$teamviewer.", dropbox='".$dropbox."', motion=".$motion.",  cpu=".$cpu.",  power=".$power.",  mem=".$mem.",  temp=".$temp.", ora=NOW()  WHERE id=1";
$result = $conn->query($sql1);

  $sql2 = "INSERT INTO stato (tunnel, teamviewer, dropbox, motion,  cpu,  power,  mem,  temp, ora) VALUES (".$tunnel.",".$teamviewer.",'".$dropbox."', ".$motion.",".$cpu.", ".$power.", ".$mem.", ".$temp.", NOW())";
$result = $conn->query($sql2);

$sql = "SELECT * from azioni  WHERE id=1";

$result = $conn->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);

echo $row["apri_tunnel"].",".$row["attiva_teamviewer"].",".$row["attiva_motion"].",".$row["attiva_dropbox"].",".$row["ora"];

echo $sql1;
$conn->close();
?>

