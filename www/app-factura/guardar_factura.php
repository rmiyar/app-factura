<?php
// Obtener los valores enviados desde el html
$Num_factura = $_POST['Num_factura'];
$direc = $_POST['direccion'];
$nom_cli = $_POST['nom_cli'];
$telefono = $_POST['telefono'];
$nom_empresa = $_POST['nom_empresa'];
$cod_cli = $_POST['cod_cli'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$subtotal = $_POST['subtotal'];
$itbm = $_POST['itbm'];
$total_pagar = $_POST['total'];

echo "Num_factura: " . $Num_factura . "<br>";
echo "direc: " . $direc . "<br>";
echo "nom_cli: " . $nom_cli . "<br>";
echo "telefono: " . $telefono . "<br>";
echo "precio: " . $precio . "<br>";
echo "cantidad: " . $cantidad . "<br>";
echo "nom_empresa: " . $nom_empresa . "<br>";
echo "cod_cli: " . $cod_cli . "<br>";
echo "descripcion: " . $descripcion . "<br>";
echo "total: " . $total . "<br>";
echo "subtotal: " . $subtotal . "<br>";
echo "itbm: " . $itbm . "<br>";
echo "total_pagar: " . $total_pagar . "<br>";


// Crear una conexión a la base de datos (asegúrate de proporcionar los valores correctos)
$host = 'localhost';
$db = 'facturadordb';
$user = 'root';
$password = '12345678';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Preparar la consulta SQL para insertar los datos en la tabla "facturas"
$sql = "INSERT INTO facturas (Num_factura, direc, nom_cli, telefono, nom_empresa, cod_cli, descripcion, cantidad, precio, `sub-total`, itbm, Total_pagar)
        VALUES ('$Num_factura', '$direc', '$nom_cli', '$telefono', '$nom_empresa', '$cod_cli', '$descripcion', '$cantidad', '$precio', '$subtotal', '$itbm', '$total_pagar')";

if ($conn->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente en la base de datos.";
	header("Location: listado_facturas.php");
	
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
