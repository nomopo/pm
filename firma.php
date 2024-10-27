<?php
require_once __DIR__ . '/vendor/autoload.php'; // Asegúrate de que esta ruta sea correcta

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$data = json_decode($_POST['data'], true);

// Verifica que los datos se hayan decodificado correctamente
if ($data === null) {
    die('Error al decodificar los datos JSON.');
}

// Extrae la información de los datos
$cliente = $data['client'];
$proyecto = $data['project'];
$presupuesto = $data['budget'];
$firma = $data['signature'];


// Inicia mPDF
$mpdf = new \Mpdf\Mpdf();

// Crea el contenido HTML
$html = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {font-family: Arial, sans-serif;}
        .firma {float: left; width: 400px; margin-right: 20px;}
        p { margin: 3px; padding: 0;}
        .section h2 {background-color: #f2f2f2; padding: 5px;}
    </style>
</head>
<body>
    <h1>Resumen y Confirmación</h1>
    <div class="section">
        <h2>Datos del Cliente</h2>
        <p><strong>Tipo:</strong> ' . htmlspecialchars($cliente['tipo']) . '</p>
        <p><strong>Nombre/Razón Social:</strong> ' . htmlspecialchars($cliente['nombreE']) . '</p>
        <p><strong>CIF:</strong> ' . htmlspecialchars($cliente['cif']) . '</p>
        <p><strong>Dirección:</strong> ' . htmlspecialchars($cliente['direccionE']) . '</p>
        <p><strong>Población:</strong> ' . htmlspecialchars($cliente['poblacionE']) . '</p>
        <p><strong>Código Postal:</strong> ' . htmlspecialchars($cliente['codigopostalE']) . '</p>
        <p><strong>Provincia:</strong> ' . htmlspecialchars($cliente['provinciaE']) . '</p>
        <p><strong>Teléfono:</strong> ' . htmlspecialchars($cliente['telefonoE']) . '</p>
        <p><strong>Email:</strong> ' . htmlspecialchars($cliente['emailE']) . '</p>
        <p><strong>Persona Contacto:</strong> ' . htmlspecialchars($cliente['contactoE']) . '</p>
        <p><strong>Observaciones:</strong> ' . htmlspecialchars($cliente['observacionesE']) . '</p>
    </div>
    <div class="section">
        <h2>Datos del Proyecto</h2>
        <p><strong>Dirección:</strong> ' . htmlspecialchars($proyecto['direccion']) . '</p>
        <p><strong>Código Postal:</strong> ' . htmlspecialchars($proyecto['cpostal']) . '</p>
        <p><strong>Población:</strong> ' . htmlspecialchars($proyecto['poblacion']) . '</p>
        <p><strong>Provincia:</strong> ' . htmlspecialchars($proyecto['provincia']) . '</p>
        <p><strong>Tipo de Actividad:</strong> ' . htmlspecialchars($proyecto['tipoactividad']) . '</p>
        <p><strong>Observaciones:</strong> ' . htmlspecialchars($proyecto['observaciones']) . '</p>
    </div>
    <div class="section">
        <h2>Datos del Presupuesto</h2>
        <p><strong>Fecha:</strong> ' . htmlspecialchars($presupuesto['fecha']) . '</p>
        <p><strong>Objetivo:</strong> ' . htmlspecialchars($presupuesto['objetivo']) . '</p>
    </div>
    <div class="section">
        <h2>Firma</h2>
        <img class="firma" src="' . htmlspecialchars($firma) . '" alt="Firma">
    </div>
</body>
</html>
';

// Escribe el HTML en el PDF
$mpdf->WriteHTML($html);

// Define el nombre del archivo y la carpeta
$filename = "{$cliente['nombreE']}_{$proyecto['poblacion']}_{$presupuesto['fecha']}.pdf";
$pdfDirectory = __DIR__ . '/pdf/';

// Verifica si la carpeta existe, si no, la crea
if (!file_exists($pdfDirectory)) {
    mkdir($pdfDirectory, 0777, true);
}

// Guarda el PDF en el servidor
$mpdf->Output($pdfDirectory . $filename, \Mpdf\Output\Destination::FILE);

// Opcionalmente, redirige al usuario o muestra un mensaje
echo "PDF guardado como {$filename} en la carpeta pdf.";
?>