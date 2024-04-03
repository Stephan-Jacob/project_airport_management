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
          <li><a href="zbor.php">Zboruri</a></li>
          <li class="selected"><a href="checkin.php">Check-In</a></li>
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
            <h3>Afisare Calatori</h3>
            <!-- AFISARE CALAOTORI  -->
                <form method="post" action="afisare_calator.php">
                <p hidden><span>ID Tabela:</span><input type="text" name="id_tabela" value="<?php echo $_POST['id_tabela'];?>" /></p>
		            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="afiseaza" value="Afisare Calatori" /></p></form>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Stergere Calator</h3>
            <!--STERGERE CALATOR-->
            <form action="stergere_calator.php" method="post">
          <div class="form_settings_mic">
          <p hidden><span>ID Tabela:</span><input type="text" name="id_tabela" value="<?php echo $_POST['id_tabela'];?>" /></p>
            <p><span>Selectati id-ul calatorului pe care doriti sa il stergeti:</span><select id="id_calator" name="id_calator">			    <?php 
					include('connection.php');
          $id_tabela = $_POST['id_tabela'];
					$sql_id="SELECT id_calator from CALATORI_".$id_tabela."  ";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
          <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="sterge" value="Stergere Calator" /></p>
          </div>
        </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <!-- ADAUGA CALATOR  -->

        <h2>Adaugare Calator</h2>
        <form action="inserare_calator.php" method="post">
          <div class="form_settings">
          <?php 
					include('connection.php');
          $id_tabela = $_POST['id_tabela'];
					$sql_id="SELECT id_calator from CALATORI_".$id_tabela."  ";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);

                    ?>
          <p hidden><span>ID Tabela:</span><input type="text" name="id_tabela" value="<?php echo $_POST['id_tabela'];?>" /></p>
          <p><span>ID Zbor:</span><select id="id_zbor" name="id_zbor">			    <?php 
					include('connection.php');
					$sql_id="SELECT id_zbor from zboruri";
					$stid_id=oci_parse($conn,$sql_id);
					$r_id=@oci_execute($stid_id);
					while(($row = oci_fetch_assoc($stid_id)))
					{				
					   echo '<option value="'.$row[(array_keys($row)[0])].'">'.$row[(array_keys($row)[0])].'</option>';
					}
			    ?> </select></p>
            <p><span>Nume:</span><input type="text" name="nume" value="" required /></p>
            <p><span>Sex:</span><select id="sex" name="sex" value="">
          <option value="M">M</option>
          <option value="F">F</option>
          </select></p>
            <p><span>ID Scaun:</span><select id="id_scaun" name="id_scaun" value="" required />
            <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          </select></p></p>

            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="adauga" value="Adauga" /></p>
            <?php 
              include('connection.php');
              $id_zbor = $_POST['id_tabela'];

              $selecttt = "SELECT ID_AVION FROM ZBORURI WHERE ID_ZBOR= ".$id_zbor." ";
              $st_selecttt = oci_parse($conn,$selecttt);
              oci_execute($st_selecttt, OCI_DEFAULT);
              $array_id_avion = oci_fetch_row($st_selecttt);
              $id_avion = $array_id_avion[0];

              $select_final = "SELECT NR_LOCURI FROM AVIOANE WHERE ID_AVION = ".$id_avion." ";
              $st_select_final = oci_parse($conn,$select_final);
              oci_execute($st_select_final, OCI_DEFAULT);
              $array_nr_locuri = oci_fetch_row($st_select_final);
              $nr_locuri = $array_nr_locuri[0];

              if($nr_locuri == 3)
              {
            ?>
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/trei_locuri.png" alt="Search" title="Search" />
            <?php
              }
            ?>
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
