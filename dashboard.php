<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
        }

        /* Botón Toggle */
        .toggle-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .toggle-button:hover::after {
            content: "Expandir/Minimizar";
            position: absolute;
            left: 50px;
            padding: 5px 10px;
            background: #34495e;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            white-space: nowrap;
        }

        /* Menú lateral */
        .sidebar {
            width: 80px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            transition: 0.3s;
            position: fixed;
            height: 100vh;
        }

        .sidebar.expanded {
            width: 250px;
        }

        .logo-container {
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background-color: white;
            border-radius: 50%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menu-item {
            padding: 15px;
            margin: 5px 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            position: relative;
            transition: 0.3s;
        }

        .menu-item:hover {
            background-color: #34495e;
        }

        .menu-item i {
            width: 50px;
            text-align: center;
        }

        .menu-item span {
            display: none;
            white-space: nowrap;
        }

        .sidebar.expanded .menu-item span {
            display: block;
        }

        /* Tooltip */
        .menu-item:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 85px;
            padding: 5px 10px;
            background: #34495e;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            white-space: nowrap;
            z-index: 1000;
        }

        .sidebar.expanded .menu-item:hover::after {
            display: none;
        }

        /* Contenido principal */
        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 80px;
            background-color: #f5f6fa;
            transition: 0.3s;
        }

        .main-content.with-expanded-sidebar {
            margin-left: 250px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .dashboard-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background-color: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 15px;
        }

        .card-content h3 {
            margin: 0;
            color: #2c3e50;
        }

        .card-content p {
            margin: 5px 0 0;
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .main-content.with-expanded-sidebar {
                margin-left: 80px;
            }
        }
    </style>
</head>
<body>
    <!-- Botón Toggle -->
    <button class="toggle-button" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Menú lateral -->
    <div class="sidebar">
        <div class="logo-container">
            <div class="logo">
                <i class="fas fa-cube fa-2x"></i>
            </div>
        </div>
        <div class="menu-item" data-tooltip="Clientes">
            <i class="fas fa-users"></i>
            <span>Clientes</span>
        </div>
        <div class="menu-item" data-tooltip="Proyectos">
            <i class="fas fa-project-diagram"></i>
            <span>Proyectos</span>
        </div>
        <div class="menu-item" data-tooltip="Contratos">
            <i class="fas fa-file-contract"></i>
            <span>Contratos</span>
        </div>
        <div class="menu-item" data-tooltip="Autorización">
            <i class="fas fa-key"></i>
            <span>Autorización</span>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="dashboard-grid">
            <!-- Tarjetas del dashboard (igual que antes) -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-content">
                    <h3>Clientes</h3>
                    <p>150 activos</p>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="card-content">
                    <h3>Proyectos</h3>
                    <p>25 en curso</p>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <div class="card-content">
                    <h3>Contratos</h3>
                    <p>45 vigentes</p>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-key"></i>
                </div>
                <div class="card-content">
                    <h3>Autorización</h3>
                    <p>12 pendientes</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleMenu() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');

            sidebar.classList.toggle('expanded');
            mainContent.classList.toggle('with-expanded-sidebar');
        }
    </script>
</body>
</html>
