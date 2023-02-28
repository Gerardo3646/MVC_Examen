<!--Este es el codigo de vista, donde se le mostrará toda la información al usuario-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/css.css">
	<title>Mi ejercicio CRUD</title>

 <!--Script para la acción de los botones--> 
	<script>
  function eliminar(id){
		if(confirm("¿ Estas seguro de eliminar el registro ?"))
		{
			window.location = "index.php?ideliminar=" + id;
		}
	}
	function modificar(id)
	{
		window.location = "index.php?idmodificar=" + id;
	}
</script>

</head>


<!--Aqui comienza el cuerpo de la Vista de la Página -->
<body>	
<?PHP 
  //Mandas a llamar al Controlador
  require '../Controlador/controlador.php';
  //instanciar la clase
  $pdo = new BD_PDO();
?>
  <!--Aquí empieza lo que es el formulario para hacer los registros -->
	<form action="index.php" id="frminsertar" name="frminsertar" method="post">
    <div class="contact_form">    
          <h1>Registro Usuario</h1>
            <h3>Ingresa los datos en los campos</h3> 
              
            <!--Campo ID: No se le mostrará al usuario-->
              <p>
                <label style="display:none;" for="nombre" class="colocar_nombre">Numero
                <span class="obligatorio">*</span>
                </label>
                <input type="text" id="txtid" name="txtid" value="<?php echo @$buscar_mod[0][0]; ?>" hidden>
              </p>

            <!--Campo Nombre: El usuario debe ingresar un nombre-->
              <p>
                <label for="nombre" class="colocar_nombre">Nombre
                <span class="obligatorio">*</span>
                </label>
                <input type="text" id="txtnombre" name="txtnombre" placeholder="Escribe tu nombre" value="<?php echo @$buscar_mod[0][1]; ?>" required>
             </p>

            <!--Campo Fecha: El usuario debe seleccionar una Fecha-->
              <p>
                <label for="Fecha" class="colocar_apellido">Apellido
                <span class="obligatorio">*</span>
                </label>
                <input type="date" id="txtfecha" name="txtfecha" placeholder="Selecciona la Fecha" value="<?php echo @$buscar_mod[0][2]; ?>" required>
              </p>
              
              <!--Botones: Se mostrará uno de los dos botones dependiendo la sección: Insertar o Modificar-->
                <button type="submit" id="btninsertar" class="registro" name="btninsertar" value="<?php if(isset($_GET['idmodificar']))
                { 
                  echo 'Modificar';
                }
                else
                {
                  echo 'Insertar';
                }
                 ?>"><p>Enviar</p></button>
        </div>
    </form>
    <!--Aquí termina el Formulario de registro-->



    <!--Aquí es el comienzo de la Tabla de Datos-->
    <form action="index.php" id="frmbuscar" name="frmbuscar" method="post">
		<table> 
    <!--Cabecera de la tabla-->
		<thead>
      <tr>
        <th>Número</th>
        <th>Nombre</th>
        <th>Fecha</th>
				<th>Accion</th>
      </tr>
    </thead>
		
    <!--Cuerpo de la tabla donde se mostrarán los datos-->
    <tbody>
			<?php foreach ($result as $renglon) { ?>
				<tr>
					<td><?php echo $renglon[0]; ?></td>
					<td><?php echo $renglon[1]; ?></td>
					<td><?php echo $renglon[2]; ?></td>
          <td>
            <input type="button" class="custom-btn btn-5" id="btneliminar" name="btneliminar" value="Eliminar" onclick="javascript: eliminar('<?php echo $renglon[0]; ?>');"></td>
					<td>
            <input type="button" class="custom-btn btn-5" id="btnmodificar" name="btnmodificar" value="Modificar" onclick="javascript: modificar('<?php echo $renglon[0]; ?>');"></td>
            <?php } ?>
    </tbody>
		</table>
	  </form>

</body>
</html>