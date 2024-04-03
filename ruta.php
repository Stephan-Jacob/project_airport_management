<!DOCTYPE HTML>
<html>

<head>
  <title>BD Iacob_Cosmin-Stefan</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Portal <span class="logo_colour">Administrare Companie Aeriana</span></a></h1>
          <h2>Tema de Casa BD Iacob Cosmin-Stefan</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.html">Home</a></li>
          <li><a href="aeroport.php">Administrare Aeroporturi</a></li>
          <li><a href="avion.php">Administrare Avioane</a></li>
          <li class="selected"><a href="ruta.php">Administrare Rute</a></li>
          <li><a href="zbor.php">Zboruri</a></li>
          <li><a href="checkin.php">Check-In</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3>Afisare Rute</h3>
            <!-- AFISARE RUTE  -->
                <form method="post" action="afisare_ruta.php">
		            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="afiseaza" value="Afisare Rute" /></p></form>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Stergere Ruta</h3>
            <!--STERGERE RUTE-->
            <form action="stergere_ruta.php" method="post">
          <div class="form_settings_mic">
            
            <p><span>Selectati id-ul rutei pe care doriti sa o stergeti:</span><select id="id_ruta" name="id_ruta">			    <?php 
					include('connection.php');
					$sql_id="SELECT id_ruta from rute";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
          <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="sterge" value="Stergere Ruta" /></p>
          </div>
        </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <!-- ADAUGA RUTE  -->

        <h2>Adaugare Ruta Noua</h2>
        <form action="inserare_ruta.php" method="post">
          <div class="form_settings">
          <p><span>Plecare:</span><select id="plecare" name="plecare">			    <?php 
					include('connection.php');
					$sql_id="SELECT id_aeroport from aeroporturi";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
          <p><span>Sosire:</span><select id="sosire" name="sosire">			    <?php 
					include('connection.php');
					$sql_id="SELECT id_aeroport from aeroporturi";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
            <p><span>Distanta:</span><input type="number" name="km" value="" required /></p>

            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="adauga" value="Adauga" /></p>
          </div>
        </form>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="aeroport.php">Administrare Aeroporturi</a> | <a href="avion.php">Administrare Avioane</a> | <a href="ruta.php">Administrare Rute</a> | <a href="zbor.php">Zboruri</a></p>
    </div>
  </div>
</body>
</html>
