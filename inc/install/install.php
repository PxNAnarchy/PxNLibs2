<html>
	
	<head>
		<meta charset="utf-8">
			<title>PxN Installation</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		    <link href="http://getbootstrap.com/examples/sticky-footer/sticky-footer.css" rel="stylesheet">


	</head>
	<body>


<?php $steep = empty($_GET['steep']) ? 1 : $_GET['steep']; ?>


		<div class="container">
      <div class="page-header">
        <center><h1>PxN Network Libs 3.0</h1></center>
      </div>

      	<?php
      		if(isset($_GET['msg']) and !empty($_GET['msg'])){

      			echo $_GET['msg'];

      		}

      		switch ($steep) {
      			case '1':
      			default:
      			?>
      
     <div class="page-header">
        <center><h3>STEEP 1</h3></center>
      </div>
      <form action="./install.inc.php" method="POST">
  <div class="form-group">
    <label for="mysqlhost">MySQL HOST</label>
    <input type="text" class="form-control" id="mysqlhost" name="mysqlhost" placeholder="MySQL Host" required>
  </div>


   <div class="form-group">
    <label for="mysqlusername">MySQL Username</label>
    <input type="text" class="form-control" id="mysqlusername" name="mysqlusername" placeholder="MySQL Username" required>
  </div>



   <div class="form-group">
    <label for="mysqlpass">MySQL Pass</label>
    <input type="password" class="form-control" id="mysqlpass" name="mysqlpass" placeholder="MySQL Password" >
  </div>


   <div class="form-group">
    <label for="mysqlhost">MySQL Base</label>
    <input type="text" class="form-control" id="mysqlbase" name="mysqlbase" placeholder="MySQL Base" required>
  </div>


 

  <input type="hidden" name="steep" value="1">
  <button type="submit" class="btn btn-default">Save</button>
</form>	
      

<?php
	break;
	
	case '2':

	


?>
	<div class="page-header">
        <center><h3>STEEP 2</h3></center>
      </div>
	<form action="./install.inc.php" method="POST">
  <div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="https://example.pxnanarchy.com" required>
  </div>


   <div class="form-group">
    <label for="domain">Domain</label>
    <input type="text" class="form-control" id="domain" name="domain" placeholder="pxnanarchy.com" required>
  </div>
   <div class="form-group">
    <label for="dir">DIR</label>
    <input type="text" class="form-control" id="dir" name="dir" value="<?php echo $_SERVER['DOCUMENT_ROOT'];?>" required>
  </div>


  <div class="form-group">
    <label for="mysqlprefix">MySQL Prefix</label>
    <input type="text" class="form-control" id="mysqlprefix" name="mysqlprefix" placeholder="MySQL Prefix" required>
  </div>

   <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="PxN Network Libs 3.0" required>
  </div>


  <div class="form-group">
    <label for="template">Template</label>
    <select name="template" placeholder="Template" class="form-control" id="template" required>
 

  <?php


  $ruta = "../assets/templates/";
		if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (($file = readdir($dh)) !== false) { 
            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
            //mostraría tanto archivos como directorios 
            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
               //solo si el archivo es un directorio, distinto que "." y ".." 
               echo "<option value='".$file."'>".$file."</option>";
               
            } 
         } 
      closedir($dh); 
      }
      } 

      ?>
      </select>
       </div>

  <input type="hidden" name="steep" value="2">
  <button type="submit" class="btn btn-default">Save</button>
</form>	
      




<?php 
	break;


    case '3':


    ?>



         <div class="page-header">
        <center><h3>STEEP 3</h3></center>
      </div>
      <form action="./install.inc.php" method="POST">
    
<br><br>
            <center> <font color="red"><h2>Creating the database</h2></font>

  <input type="hidden" name="steep" value="3">
  <button type="submit" class="btn btn-success btn-large">Let's GO</button>
  </center>
</form> 




    <?php

    break;

	
}
?>




    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">PxN Network Libs 3.0. 2016</p>
      </div>
    </footer>







		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



	</body>

</html>