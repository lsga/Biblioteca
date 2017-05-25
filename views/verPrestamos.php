<?php
  $conexion =mysqli_connect('localhost', 'root', '','ejemplo');
  //$conn = new PDO("mysql:host=localhost;dbname=ejemplo",'root', '');

      $sql = "select p.nombreAlumno, p.apellidoAlumno,c.nombreCurso from prestamo p,cursos c,ejemplo e where c.id=e.idCurso and p.nombreAlumno=e.nombre and p.apellidoAlumno=e.apellido ORDER by c.nombreCurso";
      $result = mysqli_query($conexion,$sql);

      //$eq = $this->$conn->prepare($sql);
      //$prestamo = $eq->execute();
?>
<html>
  <head>
    <title>INTEGRACION DE SISTEMAS</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <a href="../"><input type="button" value="Volver" class="btn btn-primary"></a>
      <h1>Ver Prestamos</h1>
      <table class="table">
    		<thead>
    				<th>Nombre Alumno</th>
            <th>Apellido Alumno</th>
            <th>Nombre Curso</th>
    		</thead>
    		<tbody>
          <?php while($row= mysqli_fetch_assoc($result)){
            echo '<tr>';
             echo '<td>'.$row['nombreAlumno'].'</td>';
             echo '<td>'.$row['apellidoAlumno'].'</td>';
             echo '<td>'.$row['nombreCurso'].'</td>';
            echo '</tr>';
        }?>
    		</tbody>
    </table>

  <body>
</html>
