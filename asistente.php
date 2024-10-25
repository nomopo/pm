<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistente de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tab {
            display: none;
        }
        .tab.active {
            display: block;
        }
    </style>
    <script>
        function showTab(tabIndex) {
            var tabs = document.getElementsByClassName("tab");
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove("active");
            }
            tabs[tabIndex].classList.add("active");
        }

        function nextTab(currentTabIndex) {
            var tabs = document.getElementsByClassName("tab");
            if (currentTabIndex < tabs.length - 1) {
                showTab(currentTabIndex + 1);
            } else {
                document.getElementById("registrationForm").submit();
            }
        }
    </script>
</head>
<body onload="showTab(0)">

    <div class="container mt-5">
        <form id="registrationForm" action="registrar.php" method="post">
            <div class="tab active">
                <h2>Datos del Cliente</h2>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="button" class="btn btn-primary" onclick="nextTab(0)">Siguiente</button>
            </div>

            <div class="tab">
                <h2>Datos del Proyecto</h2>
                <div class="mb-3">
                    <label for="nombreProyecto" class="form-label">Nombre del Proyecto:</label>
                    <input type="text" class="form-control" id="nombreProyecto" name="nombreProyecto" required>
                </div>
                <div class="mb-3">
                    <label for="fechaInicio" class="form-label">Fecha de Inicio:</label>
                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                </div>
                <div class="mb-3">
                    <label for="fechaFin" class="form-label">Fecha de Fin:</label>
                    <input type="date" class="form-control" id="fechaFin" name="fechaFin" required>
                </div>
                <div class="mb-3">
                    <label for="descripcionProyecto" class="form-label">Descripción:</label>
                    <textarea class="form-control" id="descripcionProyecto" name="descripcionProyecto" required></textarea>
                </div>
                <button type="button" class="btn btn-primary" onclick="nextTab(1)">Siguiente</button>
            </div>

            <div class="tab">
                <h2>Datos de Facturación</h2>
                <div class="mb-3">
                    <label for="fechaFactura" class="form-label">Fecha de Factura:</label>
                    <input type="date" class="form-control" id="fechaFactura" name="fechaFactura" required>
                </div>
                <div class="mb-3">
                    <label for="monto" class="form-label">Monto:</label>
                    <input type="number" class="form-control" id="monto" name="monto" required>
                </div>
                <div class="mb-3">
                    <label for="descripcionFactura" class="form-label">Descripción:</label>
                    <textarea class="form-control" id="descripcionFactura" name="descripcionFactura" required></textarea>
                </div>
                <button type="button" class="btn btn-primary" onclick="nextTab(2)">Siguiente</button>
            </div>

            <div class="tab">
                <h2>Aceptación</h2>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="aceptacion" name="aceptacion" required>
                    <label class="form-check-label" for="aceptacion">Acepto los términos y condiciones</label>
                </div>
                <button type="button" class="btn btn-primary" onclick="nextTab(3)">Finalizar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
