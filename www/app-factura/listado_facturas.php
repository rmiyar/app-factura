<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>sistema de factura</title>

  <style>
    /* Estilos CSS para el navbar */
    .navbar {
      background-color: #f8f8f8;
      padding: 10px;
    }
    
    .navbar ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }
    
    .navbar li {
      display: inline-block;
    }
    
    .navbar li a {
      display: block;
      padding: 10px;
      text-decoration: none;
    }
    
    /* Estilos CSS para el contenedor */
    .container {
      margin-top: 20px;
      padding: 20px;
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  	<div class="navbar">
	  <ul>
		<li><a href="./crear_factura.html">Crear factura</a></li>
		<li><a href="listado_facturas.php">Ver facturas</a></li>
	  </ul>
	</div>
</body>
</html>
<?php

// Coneccion a la base de datos facturadordb
$host = 'localhost';
$db = 'facturadordb';
$user = 'root';
$password = '12345678';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// consulta de facturas en la tabla facturas de la base datos 
$sql = "SELECT * FROM facturas";
$result = $conn->query($sql);

// if para ver  si se encontrarton facturas 
if ($result->num_rows > 0) {
    // Inicia la tabla HTML para mostrar las facturas
    echo '<div class="container">
			<table cellspacing="10">
            <tr>
                <th text-align: center; >Número de factura</th>
                <th>Nombre de la empresa</th>
				<th>direccion</th>
				<th>telefono</th>
				<th>codigo cliente</th>
				<th>nombre cliente</th>
				<th>descripcion del servicio</th>
				<th>cantidad</th>
                <th>precio unitario</th>
				<th>sub-total</th>
				<th>itbm</th>
				<th>total a pagar</th>
            </tr>';
			
		

    // mostrar los resultados de cada campo en la base de datos 
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td align="center">' . $row['Num_factura'] . '</td>
                <td align="center">' . $row['nom_empresa'] . '</td>
				<td align="center">' . $row['direc'] . '</td>
                <td align="center">' . $row['telefono'] . '</td>
				<td align="center">' . $row['cod_cli'] . '</td>
				<td align="center">' . $row['nom_cli'] . '</td>
				<td align="center">' . $row['descripcion'] . '</td>
				<td align="center">' . $row['cantidad'] . '</td>
				<td align="center">' . $row['precio'] . '</td>
				<td align="center">' . $row['sub-total'] . '</td>
				<td align="center">' . $row['itbm'] . '</td>
				<td align="center">' . $row['Total_pagar'] . '</td>
              </tr>';
    }

    // Cierra la tabla HTML
    echo '   </table>
	        <div> ';
} else {
    echo 'No se encontraron facturas.';
}

?>

