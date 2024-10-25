<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Paso 1 de 4</div>
        </div>

        <h2>Registro de Cliente</h2>

        <form id="clienteForm" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tipo de Cliente</label>
                    <select class="form-select" name="tipo" required>
                        <option value="">Seleccione...</option>
                        <option value="E">Empresa</option>
                        <option value="P">Particular</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nombre/Razón Social</label>
                    <input type="text" class="form-control" name="nombreE" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">CIF/NIF</label>
                    <input type="text" class="form-control" name="cif" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccionE" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Población</label>
                    <input type="text" class="form-control" name="poblacionE" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Código Postal</label>
                    <input type="text" class="form-control" name="codigopostalE" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Provincia</label>
                    <input type="text" class="form-control" name="provinciaE" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" name="telefonoE" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="emailE" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Persona de Contacto</label>
                    <input type="text" class="form-control" name="contactoE">
                </div>

                <div class="col-12">
                    <label class="form-label">Observaciones</label>
                    <textarea class="form-control" name="observacionesE" rows="3"></textarea>
                </div>

                <div class="col-12">
                    <button type="button" class="btn btn-primary" onclick="siguientePaso()">Siguiente</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function siguientePaso() {
            // Validar el formulario
            const form = document.getElementById('clienteForm');
            if (form.checkValidity()) {
                // Guardar datos y redirigir al siguiente paso
                const formData = new FormData(form);
                localStorage.setItem('clienteData', JSON.stringify(Object.fromEntries(formData)));
                window.location.href = 'proyecto.php';
            } else {
                form.classList.add('was-validated');
            }
        }
    </script>
</body>
</html>
