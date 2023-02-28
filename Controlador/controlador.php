<?php 
		// Importo el archivo de la clase de conexion a la BD
		require '../Modelo/conexion_bd.php';
		// Crear al objeto de la clase BD_PDO
		$obj = new BD_PDO();
		// Linea que ejecuta la instruccion sql en la BD
		if (isset($_POST['btninsertar'])) 
		{
			$nombre = $_POST['txtnombre'];
			$fecha = $_POST['txtfecha'];
			if ($_POST['btninsertar']=='Insertar') 
			{
				$obj->Ejecutar_Instruccion("Insert into categorias(Nombre, Fecha) values('$nombre','$fecha')");
			}
			elseif ($_POST['btninsertar']=='Modificar') 
			{
				$id = $_POST['txtid'];
				$obj->Ejecutar_Instruccion("update categorias set Nombre='$nombre', Fecha='$fecha' where id_categoria = '$id'");
			}
			
		}
		//En caso de no ser la primera opción, la instruccion sql se dirige a eliminar
		elseif (isset($_GET['ideliminar'])) 
		{		
			$ideliminar = $_GET['ideliminar'];
			$obj->Ejecutar_Instruccion("Delete from categorias where id_categoria = '$ideliminar'");
		}
		//En caso de no ser la primera opción, la instruccion sql se dirige a modificar
		elseif (isset($_GET['idmodificar'])) 
		{		
			$idmodificar = $_GET['idmodificar'];
			$buscar_mod = $obj->Ejecutar_Instruccion("Select * from categorias where id_categoria = '$idmodificar'");
		}

		if (isset($_POST['btnbuscar'])) 
		{
			$buscar = $_POST['txtbuscar'];
			$result = $obj->Ejecutar_Instruccion("Select * from categorias where Nombre like '%$buscar%'");
		}
		else
		{
			$result = $obj->Ejecutar_Instruccion("Select * from categorias");
		}
	
		// LInea que muestra el contenido de la variable $result
		//var_dump($result);
 	?>

