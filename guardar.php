<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

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

            // Insertar cliente
            $stmt = $pdo->prepare("INSERT INTO clientes (tipo, nombreE, cif, direccionE, poblacionE, codigopostalE, provinciaE, telefonoE, emailE, contactoE, observacionesE)
                                 VALUES (:tipo, :nombreE, :cif, :direccionE, :poblacionE, :codigopostalE, :provinciaE, :telefonoE, :emailE, :contactoE, :observacionesE)");
            $stmt->execute([
                ":tipo" => $data["client"]["tipo"],
                ":nombreE" => $data["client"]["nombreE"],
                ":cif" => $data["client"]["cif"],
                ":direccionE" => $data["client"]["direccionE"],
                ":poblacionE" => $data["client"]["poblacionE"],
                ":codigopostalE" => $data["client"]["codigopostalE"],
                ":provinciaE" => $data["client"]["provinciaE"],
                ":telefonoE" => $data["client"]["telefonoE"],
                ":emailE" => $data["client"]["emailE"],
                ":contactoE" => $data["client"]["contactoE"],
                ":observacionesE" => $data["client"]["observacionesE"],
            ]);
            $clientId = $pdo->lastInsertId();

            // Insertar proyecto (ahora incluyendo la firma)
            $stmt = $pdo->prepare("INSERT INTO proyectos (id_cliente, direccion, cpostal, poblacion, provincia, tipoactividad, observaciones, firma)
                                 VALUES (:client_id, :direction, :cpostal, :poblacion, :provincia, :tipoactividad, :observaciones, :firma)");
            $stmt->execute([
                ":client_id" => $clientId,
                ":direction" => $data["project"]["direccion"],
                ":cpostal" => $data["project"]["cpostal"],
                ":poblacion" => $data["project"]["poblacion"],
                ":provincia" => $data["project"]["provincia"],
                ":tipoactividad" => $data["project"]["tipoactividad"],
                ":observaciones" => $data["project"]["observaciones"],
                ":firma" => $data["signature"],
            ]);
            $projectId = $pdo->lastInsertId();

            // Insertar presupuesto
            $stmt = $pdo->prepare("INSERT INTO presupuestos (id_cliente, id_proyecto, fecha, objetivo)
                                 VALUES (:client_id, :project_id, :fecha, :objetivo)");
            $stmt->execute([
                ":client_id" => $clientId,
                ":project_id" => $projectId,
                ":fecha" => $data["budget"]["fecha"],
                ":objetivo" => $data["budget"]["objetivo"],
            ]);

            $pdo->commit();
            echo json_encode([
                "status" => "success",
                "message" => "Datos guardados correctamente",
            ]);
        } catch (PDOException $e) {
            $pdo->rollBack();
            http_response_code(500);
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage(),
            ]);
        }
    } else {
        http_response_code(400);
        echo json_encode([
            "status" => "error",
            "message" => "Datos JSON no válidos",
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>
