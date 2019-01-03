<?php

  require "connessione.php";
  $attiva_temviewer = $_POST['attiva_teamviewer'];
  if(empty($attiva_temviewer)) 
  {
    $attiva_temviewer = 0;
    echo("Hai deciso di disattivare Teamviewer.<br/>");
  } 
  else 
  {
    $attiva_temviewer = 1;
    echo("Hai deciso di attivare Teamviewer.<br/>");
  }
  $attiva_motion = $_POST['attiva_motion'];
  if(empty($attiva_motion)) 
  {
    $attiva_motion = 0;
    echo("Hai deciso di disattivare Motion.<br/>");
  } 
  else 
  {
    $attiva_motion = 1;
    echo("Hai deciso di attivare Motion.<br/>");
  }
  $attiva_dropbox = $_POST['attiva_dropbox'];
  if(empty($attiva_dropbox)) 
  {
    $attiva_dropbox = 0;
    echo("Hai deciso di disattivare Teamviewer.<br/>");
  } 
  else 
  {
    $attiva_dropbox = 1;
    echo("Hai deciso di attivare Dropbox.<br/>");
  }
  $apri_tunnel = $_POST['apri_tunnel'];
  if(empty($apri_tunnel)) 
  {
    $apri_tunnel = 0;
    echo("Hai deciso di chiudere il tunnel.");
  } 
  else 
  {
    $apri_tunnel = 1;
    echo("Hai deciso di aprire il tunnel");
  }
echo "<br/>Apri Tunnel: ".$apri_tunnel."<br/>Attiva Team Viewer: ".$attiva_temviewer;

$sql = "UPDATE azioni SET apri_tunnel=".$apri_tunnel.", attiva_teamviewer=".$attiva_temviewer.", attiva_motion=".$attiva_motion.", attiva_dropbox=".$attiva_dropbox.", ora=NOW()  WHERE id=1";
if ($conn->query($sql) === TRUE) {
    echo "<br/>Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
<p><a href="./">Indice</a></p>
<p><a href="stato.php">Visualizza stato</a></p>
