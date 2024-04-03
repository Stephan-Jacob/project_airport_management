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
          <li><a href="ruta.php">Administrare Rute</a></li>
          <li><a href="zbor.php" clas="selected">Zboruri</a></li>
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
            <h3>Afisare Zboruri</h3>
            <!-- AFISARE ZBORURI  -->
                <form method="post" action="afisare_zbor.php">
		            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="afiseaza" value="Afisare Zboruri" /></p></form>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Stergere Zboruri</h3>
            <!--STERGERE ZBORURI-->
            <form action="stergere_zbor.php" method="post">
          <div class="form_settings_mic">
            
            <p><span>Selectati id-ul zborului pe care doriti sa il stergeti:</span><select id="id_zbor" name="id_zbor">			    <?php 
					include('connection.php');
					$sql_id="SELECT id_zbor from zboruri";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
          <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="sterge" value="Stergere Zbor" /></p>
          </div>
        </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <!-- ADAUGA ZBORURI  -->

        <h2>Adaugare Zbor Nou</h2>
        <form action="inserare_zbor.php" method="post">
          <div class="form_settings">
          <p><span>ID Ruta:</span><select id="id_ruta" name="id_ruta">			    <?php 
					include('connection.php');
					$sql_id="SELECT id_ruta from rute";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
          <p><span>ID Avion:</span><select id="id_avion" name="id_avion">			    <?php 
					include('connection.php');
					$sql_id="SELECT id_avion from avioane";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
            <p><span>Ziua:</span><input type="date" name="ziua" value="<?php echo date('Y-m-d'); ?>" required /></p>

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
