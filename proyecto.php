<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Paso 2 de 4</div>
        </div>

        <h2>Datos del Proyecto</h2>

        <form id="proyectoForm" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Dirección del Proyecto</label>
                    <input type="text" class="form-control" name="direccion" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="cpostal" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Población</label>
                    <input type="text" class="form-control" name="poblacion" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Provincia</label>
                    <input type="text" class="form-control" name="provincia" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Tipo de Actividad</label>
                    <input type="text" class="form-control" name="tipoactividad" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Observaciones</label>
                    <textarea class="form-control" name="observaciones" rows="3"></textarea>
                </div>

                <div class="col-12">
                    <button type="button" class="btn btn-secondary me-2" onclick="history.back()">Anterior</button>
                    <button type="button" class="btn btn-primary" onclick="siguientePaso()">Siguiente</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function siguientePaso() {
            const form = document.getElementById('proyectoForm');
            if (form.checkValidity()) {
                const formData = new FormData(form);
                localStorage.setItem('proyectoData', JSON.stringify(Object.fromEntries(formData)));
                window.location.href = 'presupuesto.php';
            } else {
                form.classList.add('was-validated');
            }
        }
    </script>
</body>
</html>
