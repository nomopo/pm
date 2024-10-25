<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Completado</div>
        </div>

        <h2>Resumen y Confirmación</h2>

        <div class="card mb-3">
            <div class="card-header">
                <h5>Datos del Cliente</h5>
            </div>
            <div class="card-body" id="clienteResumen"></div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h5>Datos del Proyecto</h5>
            </div>
            <div class="card-body" id="proyectoResumen"></div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h5>Datos del Presupuesto</h5>
            </div>
            <div class="card-body" id="presupuestoResumen"></div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <button type="button" class="btn btn-secondary me-2" onclick="history.back()">Anterior</button>
                <button type="button" class="btn btn-success" onclick="confirmarTodo()">Confirmar y Enviar</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.onload = function() {
            const clienteData = JSON.parse(localStorage.getItem('clienteData'));
            const proyectoData = JSON.parse(localStorage.getItem('proyectoData'));
            const presupuestoData = JSON.parse(localStorage.getItem('presupuestoData'));

            document.getElementById('clienteResumen').innerHTML = `
                <p><strong>Tipo:</strong> ${clienteData.tipo}</p>
                <p><strong>Nombre/Razón Social:</strong> ${clienteData.nombreE}</p>
                <p><strong>CIF:</strong> ${clienteData.cif}</p>
                <p><strong>Dirección:</strong> ${clienteData.direccionE}</p>
                <p><strong>Población:</strong> ${clienteData.poblacionE}</p>
                <p><strong>Código Postal:</strong> ${clienteData.cpostalE}</p>
                <p><strong>Provincia:</strong> ${clienteData.provinciaE}</p>
                <p><strong>Teléfono:</strong> ${clienteData.telefonoE}</p>
                <p><strong>Email:</strong> ${clienteData.emailE}</p>
                <p><strong>Persona Contacto:</strong> ${clienteData.contactoE}</p>
                <p><strong>Observaciones:</strong> ${clienteData.observacionesE}</p>
            `;

            document.getElementById('proyectoResumen').innerHTML = `
                <p><strong>Dirección:</strong> ${proyectoData.direccion}</p>
                <p><strong>Código Postal:</strong> ${proyectoData.cpostal}</p>
                <p><strong>Población:</strong> ${proyectoData.poblacion}</p>
                <p><strong>Provincia:</strong> ${proyectoData.provincia}</p>
                <p><strong>Tipo de Actividad:</strong> ${proyectoData.tipoactividad}</p>
                <p><strong>Observaciones:</strong> ${proyectoData.observaciones}</p>
            `;

            document.getElementById('presupuestoResumen').innerHTML = `
                <p><strong>Fecha:</strong> ${presupuestoData.fecha}</p>
                <p><strong>Objetivo:</strong> ${presupuestoData.objetivo}</p>
            `;
        }

        function confirmarTodo() {
            const allData = {
                cliente: JSON.parse(localStorage.getItem('clienteData')),
                proyecto: JSON.parse(localStorage.getItem('proyectoData')),
                presupuesto: JSON.parse(localStorage.getItem('presupuestoData'))
            };

            fetch('guardar.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(allData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Datos guardados correctamente');
                    localStorage.clear();
                } else {
                    alert('Error al guardar: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al enviar los datos.');
            });
        }
    </script>
</body>
</html>
