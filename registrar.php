<?php
require "db.php";

// Verificar conexión
// if ($pdo->connect_error) {
//     die("Conexión fallida: " . $conn->connect_error);
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $nombreProyecto = $_POST["nombreProyecto"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    $descripcionProyecto = $_POST["descripcionProyecto"];
    $fechaFactura = $_POST["fechaFactura"];
    $monto = $_POST["monto"];
    $descripcionFactura = $_POST["descripcionFactura"];

    try {
        $sql_cliente = $pdo->prepare(
            "INSERT INTO Clientes (Nombre, Direccion, Telefono, Email, FechaRegistro) VALUES (?, ?, ?, ?, NOW())"
        );
        $sql_cliente->execute([$nombre, $direccion, $telefono, $email]);
        $clienteID = $pdo->lastInsertId();

        $sql_proyecto = $pdo->prepare(
            "INSERT INTO Proyectos (ClienteID, NombreProyecto, FechaInicio, FechaFin, Descripcion) VALUES (?, ?, ?, ?, ?)"
        );
        $sql_proyecto->execute([
            $clienteID,
            $nombreProyecto,
            $fechaInicio,
            $fechaFin,
            $descripcionProyecto,
        ]);

        $sql_factura = $pdo->prepare(
            "INSERT INTO Facturacion (ClienteID, FechaFactura, Monto, Descripcion) VALUES (?, ?, ?, ?)"
        );
        $sql_factura->execute([
            $clienteID,
            $fechaFactura,
            $monto,
            $descripcionFactura,
        ]);

        echo "Registro completado con éxito";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
