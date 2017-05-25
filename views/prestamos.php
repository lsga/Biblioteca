<?php
  $conexion =mysqli_connect('localhost', 'root', '','ejemplo');
?>
<html>
  <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script language="javascript" type="text/javascript">
      //var ced=document.getElementById("").value;
      function setCedula(nombre){
        var nom = nombre.substring(0,9);
        var ape = nombre.substring(10);
        document.getElementById("nombre").value=nom;
        document.getElementById("apellido").value=ape;
      }
    </script>
    <script language="javascript" type="text/javascript">
      function limpiar() {
        document.getElementById("nombre").value="";
        document.getElementById("apellido").value="";
      }
    </script>
  </head>
  <body onload="limpiar()">
    <a href="../"><input type="button" value="Volver" class="btn btn-primary"></a>
    <form method="post" action="" onload="limpiar()">
      <h1>Ingresar Prestamo</h1>
      <select onchange="setCedula(this.value)">
        <option value="" selected>Elegir Estudiante</option>
        <?php
          $sql = "select * from ejemplo";
          $result = mysqli_query($conexion,$sql);
          while($row= mysqli_fetch_assoc($result)){
             echo '<option value="'.$row['nombre'].' '.$row['apellido'].'">'.$row['cedula'].'</option>';
        }?>
      </select><br><br>
      Nombre: <input type="text" name="nombre" id="nombre" value=""><br><br>
      Apellido: <input type="text" name="apellido" id="apellido" value=""><br><br>
      <input type="submit" value="Ingresar Prestamo" class="btn btn-primary" name="guardar" id="guardar">
      <p id="res"></p>
    </form>
  </body>
</html>
<?php
  try{
    if ($_POST['nombre'] == "" && $_POST['apellido']=="") {
      //echo "Elija Alumno";
      echo '<script language="javascript">alert("Elija Alumno");</script>';
    }else {
      $conn =new PDO("mysql:host=localhost;dbname=ejemplo",'root', '');
      $name = $_POST['nombre'];
      $lastname = $_POST['apellido'];
      //new PDO("mysql:host=localhost;dbname=colegio",'root', '');
      $sql = "insert into prestamo (nombreAlumno,apellidoAlumno) values('".$name."','".$lastname."')";
      $conn -> exec($sql);
      //echo 'Prestamo Ingresado';
      echo '<script language="javascript">alert("Prestamo Ingresado");</script>';
    }
  }catch(PDOException $e)
      {

      }
  $conn = null;
?>
