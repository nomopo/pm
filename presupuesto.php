<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Paso 3 de 4</div>
        </div>

        <h2>Presupuesto</h2>

        <form id="presupuestoForm" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Objetivo del Proyecto</label>
                    <textarea class="form-control" name="objetivo" rows="4" required></textarea>
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
            const form = document.getElementById('presupuestoForm');
            if (form.checkValidity()) {
                const formData = new FormData(form);
                localStorage.setItem('presupuestoData', JSON.stringify(Object.fromEntries(formData)));
                window.location.href = 'confirmacion.php';
            } else {
                form.classList.add('was-validated');
            }
        }
    </script>
</body>
</html>
