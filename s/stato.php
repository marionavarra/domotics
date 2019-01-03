<?php
require "connessione.php";

$sql = "SELECT * from azioni  WHERE id=1";

$result = $conn->query($sql);

$row1 = $result->fetch_array(MYSQLI_ASSOC);

$sql = "SELECT * from stato  WHERE id=1";

$result = $conn->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);

?>
<style>
  table, th, td {
   border: 1px solid black;
   border-collapse: collapse;
}

</style>

<table>
  <tr>
    <th>
    	Item
    </th>    
    <th style="width: 90px;">
    	Stato
    </th>
    <th style="width: 90px;">
    	Obiettivo
    </th>
  </tr>
  <tr>
    <td>
    	Tunnel
    </td>
    <td>
      <?php
	echo $row["tunnel"]; 
      ?>
    </td>
    <td style="text-align:center;">
      <?php
        echo $row1["apri_tunnel"]; 
      ?>
    </td>
  </tr>
  <tr>
    <td>
    	Teamviewer
    </td>
    <td style="">
      <?php
	echo $row["teamviewer"]; 
      ?>
    </td>
    <td style="text-align:center;">
      <?php
        echo $row1["attiva_teamviewer"]; 
      ?>
    </td>
  </tr>
  <tr>
  <tr>
    <td>
    	Motion
    </td>
    <td style="">
      <?php
	echo $row["motion"]; 
      ?>
    </td>
    <td style="text-align:center;">
      <?php
        echo $row1["attiva_motion"]; 
      ?>
    </td>
  </tr>
  <tr>
    <td>
    	DropBox
    </td>
    <td style="">
      <?php
	echo $row["dropbox"]; 
      ?>
    </td>
    <td style="text-align:center;">
      <?php
        echo $row1["attiva_dropbox"]; 
      ?>
    </td>
  </tr>
  <tr>
    <td>
    	Power
    </td>
    <td>
    <?php
        if ($row["power"] == 1)
	  echo "In carica";
 	else
	  echo "<b style='color: red;'>Senza CARICA</b>";
    ?>
    </td>
    
  </tr>
  <tr>
    <td>
    	Cpu
    </td>
    <td>
    <?php
	echo $row["cpu"]; 
    ?>    
    </td>
  </tr>
  <tr>
    <td>
    	Memory
    </td>
    <td>
     <?php
	echo $row["mem"]; 
    ?>   
    </td>
  </tr>
  <tr>
    <td>
    	Temperatura
    </td>
    <td>
     <?php
	echo $row["temp"]; 
    ?>
    </td>
   
  </tr>
  <tr>
    <td>
    	Ora rilevazione/<br/>richiesta
    </td>
    <td>
      <?php
        echo $row["ora"]; 
      ?>
    </td>
      <td>
	<?php
	echo $row1["ora"]; 
    ?>
    </td>
  </tr>
</table>

<p><a href="./">Indice</a></p>
<p><a href="form_azioni.php">Modifica</a></p>
<?php
$conn->close();
?>

