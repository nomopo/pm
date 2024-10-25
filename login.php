<?php
// Iniciar la sesión
session_start();

// Incluir el archivo de conexión a la base de datos
require_once "db.php";

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos no estén vacíos
    if (empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
        $error = "Por favor ingrese usuario y contraseña.";
    } else {
        // Preparar y ejecutar la consulta
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        try {
            // Verificar si la conexión existe
            if (!isset($pdo)) {
                throw new Exception("Error de conexión a la base de datos");
            }

            $stmt = $pdo->prepare(
                "SELECT id, username, password FROM users WHERE username = :username"
            );
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->execute();

            // Verificar si se encontró el usuario
            if ($stmt->rowCount() == 1) {
                // Obtener el resultado
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $hashed_password = $row["password"];
                // Verificar la contraseña
                if ($password === $hashed_password) {
                    // Contraseña correcta, iniciar sesión
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $row["username"];

                    // Redirigir al dashboard
                    header("Location: dashboard.php");
                    exit();
                } else {
                    // Contraseña incorrecta
                    $error = "La contraseñas ingresada no es válida.";
                }
            } else {
                // Usuario no encontrado
                $error = "No se encontró una cuenta con ese nombre de usuario.";
            }
        } catch (Exception $e) {
            // Manejar errores de la base de datos
            $error = "Error del sistema: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <!-- Enlace a CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h3 class="text-center">Iniciar Sesión</h3>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php } ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" name="username" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </form>
        </div>
    </div>
</div>

<!-- Enlace a JavaScript de Bootstrap y dependencias -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<scrip
