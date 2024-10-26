<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$host = "localhost";
$dbname = "pm";
$user = "root";
$password = "1122";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$stmt = $pdo->query("SELECT * FROM proyectos");
$proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($proyectos as $proyecto) {
    echo "ID: " . $proyecto["id"] . "<br>";
    echo "Cliente ID: " . $proyecto["id_cliente"] . "<br>";
    echo "Dirección: " . $proyecto["direccion"] . "<br>";
    echo "Código Postal: " . $proyecto["cpostal"] . "<br>";
    echo "Población: " . $proyecto["poblacion"] . "<br>";
    echo "Provincia: " . $proyecto["provincia"] . "<br>";
    echo "Tipo Actividad: " . $proyecto["tipoactividad"] . "<br>";
    echo "Observaciones: " . $proyecto["observaciones"] . "<br>";
    if ($proyecto["firma"]) {
        echo '<img src="' .
            $proyecto["firma"] .
            '" alt="Firma" style="max-width: 300px;"><br>';
    } else {
        echo "No hay firma disponible<br>";
    }
    echo "<hr>";
}
