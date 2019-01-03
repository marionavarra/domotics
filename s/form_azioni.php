<?php
require "connessione.php";

$sql = "SELECT * from azioni  WHERE id=1";

$result = $conn->query($sql);

$row1 = $result->fetch_array(MYSQLI_ASSOC);

$sql = "SELECT * from stato  WHERE id=1";

$result = $conn->query($sql);
?>

<form action="salva_azioni.php" method="post">
    Sottometti le modifiche<br/>
   <input type="checkbox" name="apri_tunnel" value="1" 
         <?php
        if ($row1["apri_tunnel"] == "1") {
	  echo "checked";
	}
      ?>
    /> Apri tunnel<br/>
    <input type="checkbox" name="attiva_teamviewer" value="1" 
     <?php
        if ($row1["attiva_teamviewer"] == "1") {
	  echo "checked";
	}
      ?>
     /> Attiva Teamviewer<br/>
    <input type="checkbox" name="attiva_motion" value="1" 
     <?php
        if ($row1["attiva_motion"] == "1") {
	  echo "checked";
	}
      ?>
     /> Attiva Motion<br/>
    <input type="checkbox" name="attiva_dropbox" value="1" 
     <?php
        if ($row1["attiva_dropbox"] == "1") {
	  echo "checked";
	}
      ?>
     /> Attiva dropbox<br/>
     <input type="submit" name="formSubmit" value="Salva" />
</form>
<p><a href="./">Indice</a></p>
