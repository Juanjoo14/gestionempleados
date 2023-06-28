<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Departamentos</title>
</head>

<body style="background-image: url('img/bg2.jpg');">
    <div class="container text-center p-4">
        <div class="row py-3">
            <div class="col">
                <h1 class="h2">Crear Departamento</h1>
            </div>
        </div>
        <div class="row py-3">
            <form method="POST" action="index.php?action=crearDepartamento">
                <div class="row justify-content-center py-2">
                    <div class="col-1">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" id="nombre" name="nombre" class="form-control">
                    </div>
                </div>
                <div class="row justify-content-center py-2">
                    <div class="col-2">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>