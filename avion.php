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
          <li class="selected"><a href="avion.php">Administrare Avioane</a></li>
          <li><a href="ruta.php">Administrare Rute</a></li>
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
            <h3>Afisare Avion</h3>
            <!-- AFISARE AVION  -->
                <form method="post" action="afisare_avion.php">
		            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="afiseaza" value="Afisare Avioane" /></p></form>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Stergere Avion</h3>
            <!--STERGERE AVION-->
            <form action="stergere_avion.php" method="post">
          <div class="form_settings_mic">
            
            <p><span>Selectati id-ul avionului pe care doriti sa il stergeti:</span><select id="id_avion" name="id_avion">			    <?php 
					include('connection.php');
					$sql_id="SELECT id_avion from avioane";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
          <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="sterge" value="Stergere Avion" /></p>
          </div>
        </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <!-- ADAUGA AVION  -->

        <h2>Adaugare Avion</h2>
        <form action="inserare_avion.php" method="post">
          <div class="form_settings">
            <p><span>Model:</span><input type="text" name="model" value="" required /></p>
            <p><span>Autonomie:</span><input type="number" name="autonomie" value="" required /></p>
            <p><span>Numar locuri:</span><input type="number" name="nr_locuri" value="" required /></p>

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
