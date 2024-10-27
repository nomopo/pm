<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #signature-pad {
            border: 1px solid #ccc;
            border-radius: 4px;
            touch-action: none;
            width: 100%;
            height: 200px;
            background-color: white;
        }
    </style>
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

        <div class="card mb-3">
            <div class="card-header">
                <h5>Firma</h5>
            </div>
            <div class="card-body">
                <canvas id="signature-pad"></canvas>
                <div class="mt-2">
                    <button type="button" class="btn btn-secondary btn-sm" id="clear-signature">Borrar Firma</button>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <button type="button" class="btn btn-secondary me-2" onclick="history.back()">Anterior</button>
                <button type="button" class="btn btn-success" onclick="confirmarTodo()">Confirmar y Enviar</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>
    <script>
        let signaturePad;

        window.onload = function() {
            // Inicializar el pad de firma
            const canvas = document.getElementById('signature-pad');
            signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)',
                penColor: 'rgb(0, 0, 0)'
            });

            // Ajustar el tamaño del canvas
            function resizeCanvas() {
                const ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
                signaturePad.clear();
            }

            window.addEventListener("resize", resizeCanvas);
            resizeCanvas();

            // Cargar datos del localStorage
            const clienteData = JSON.parse(localStorage.getItem('clienteData'));
            const proyectoData = JSON.parse(localStorage.getItem('proyectoData'));
            const presupuestoData = JSON.parse(localStorage.getItem('presupuestoData'));

            // Mostrar resumen de cliente
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

            // Mostrar resumen de proyecto
            document.getElementById('proyectoResumen').innerHTML = `
                <p><strong>Dirección:</strong> ${proyectoData.direccion}</p>
                <p><strong>Código Postal:</strong> ${proyectoData.cpostal}</p>
                <p><strong>Población:</strong> ${proyectoData.poblacion}</p>
                <p><strong>Provincia:</strong> ${proyectoData.provincia}</p>
                <p><strong>Tipo de Actividad:</strong> ${proyectoData.tipoactividad}</p>
                <p><strong>Observaciones:</strong> ${proyectoData.observaciones}</p>
            `;

            // Mostrar resumen de presupuesto
            document.getElementById('presupuestoResumen').innerHTML = `
                <p><strong>Fecha:</strong> ${presupuestoData.fecha}</p>
                <p><strong>Objetivo:</strong> ${presupuestoData.objetivo}</p>
            `;
        };

        // Limpiar firma
        document.getElementById('clear-signature').addEventListener('click', function() {
            signaturePad.clear();
        });

        // Función para confirmar y enviar
        function confirmarTodo() {
            if (signaturePad.isEmpty()) {
                alert('Por favor, añada su firma antes de continuar.');
                return;
            }

            const allData = {
                client: JSON.parse(localStorage.getItem('clienteData')),
                project: JSON.parse(localStorage.getItem('proyectoData')),
                budget: JSON.parse(localStorage.getItem('presupuestoData')),
                signature: signaturePad.toDataURL()
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
                    
                    // Crear un formulario y enviarlo
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'firma.php';

                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'data';
                    input.value = JSON.stringify(allData);

                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
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
