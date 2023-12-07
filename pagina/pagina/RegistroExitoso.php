<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar exitoso</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/estilosRegistrar.css">
    <script src="JavaScrip/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div class="container">
        <form method="post" class="row mx-auto g-3" style="width: 40%;">
            
            <div class="alert alert-success" role="alert">
                <h3>¡Éxito! Tu acción se ha completado correctamente.</h3>

            </div>
            <div class="d-flex justify-content-between p-4">
                <a href="login.php" class="btn btn-success">Iniciar Sesión</a>
                <a href="index.php" class="btn btn-primary">Inicio</a>
               
            </div>
        </form>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>