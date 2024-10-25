<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

// Configuración de la base de datos
$host = "localhost";
$dbname = "pm";
$user = "root";
$password = "1122";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    if (json_last_error() === JSON_ERROR_NONE) {
        try {
            $pdo = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $user,
                $password
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->beginTransaction();

            // Debugging message for JSON content
            error_log("Data received for insertion: " . print_r($data, true));

            // Insertar los datos del cliente
            $stmt = $pdo->prepare(
                "INSERT INTO clientes (tipo, nombreE, cif, direccionE, poblacionE, codigopostalE, provinciaE, telefonoE, emailE, contactoE, observacionesE) VALUES (:tipo, :nombreE, :cif, :direccionE, :poblacionE, :codigopostalE, :provinciaE, :telefonoE, :emailE, :contactoE, :observacionesE)"
            );
            $stmt->execute([
                ":tipo" => $data["cliente"]["tipo"],
                ":nombreE" => $data["cliente"]["nombreE"],
                ":cif" => $data["cliente"]["cif"],
                ":direccionE" => $data["cliente"]["direccionE"],
                ":poblacionE" => $data["cliente"]["poblacionE"],
                ":codigopostalE" => $data["cliente"]["codigopostalE"],
                ":provinciaE" => $data["cliente"]["provinciaE"],
                ":telefonoE" => $data["cliente"]["telefonoE"],
                ":emailE" => $data["cliente"]["emailE"],
                ":contactoE" => $data["cliente"]["contactoE"],
                ":observacionesE" => $data["cliente"]["observacionesE"],
            ]);
            $cliente_id = $pdo->lastInsertId();
            error_log(
                "Client data inserted successfully with ID: " . $cliente_id
            );

            // Insertar los datos del proyecto
            $stmt = $pdo->prepare(
                "INSERT INTO proyectos (id_cliente, direccion, cpostal, poblacion, provincia, tipoactividad, observaciones) VALUES (:cliente_id, :direccion, :cpostal, :poblacion, :provincia, :tipoactividad, :observaciones)"
            );
            $stmt->execute([
                ":cliente_id" => $cliente_id,
                ":direccion" => $data["proyecto"]["direccion"],
                ":cpostal" => $data["proyecto"]["cpostal"],
                ":poblacion" => $data["proyecto"]["poblacion"],
                ":provincia" => $data["proyecto"]["poblacion"],
                ":tipoactividad" => $data["proyecto"]["tipoactividad"],
                ":observaciones" => $data["proyecto"]["observaciones"],
            ]);
            $proyecto_id = $pdo->lastInsertId();
            error_log(
                "Project data inserted successfully with ID: " . $proyecto_id
            );

            // Insertar los datos del presupuesto
            $stmt = $pdo->prepare(
                "INSERT INTO presupuestos (id_cliente, id_proyecto, fecha, objetivo) VALUES (:cliente_id, :proyecto_id, :fecha, :objetivo)"
            );
            $stmt->execute([
                ":cliente_id" => $cliente_id,
                ":proyecto_id" => $proyecto_id,
                ":fecha" => $data["presupuesto"]["fecha"],
                ":objetivo" => $data["presupuesto"]["objetivo"],
            ]);
            error_log("Budget data inserted successfully.");

            // Confirmar la transacción
            $pdo->commit();

            echo json_encode([
                "status" => "success",
                "message" => "Datos guardados correctamente",
            ]);
        } catch (PDOException $e) {
            $pdo->rollBack();
            http_response_code(500);
            error_log("Error in transaction: " . $e->getMessage());
            echo json_encode([
                "status" => "error",
                "message" => "Error al guardar los datos",
                "error" => $e->getMessage(),
            ]);
        }
    } else {
        http_response_code(400);
        error_log("Invalid JSON data received: " . $json);
        echo json_encode([
            "status" => "error",
            "message" => "Datos JSON no válidos",
        ]);
    }
} else {
    http_response_code(405);
    error_log("Invalid request method: " . $_SERVER["REQUEST_METHOD"]);
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>
