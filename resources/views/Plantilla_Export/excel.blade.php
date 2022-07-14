<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Nombre</th>
            <th class="text-center">Correo de Usuario</th>
            <th class="text-center">Tipo de Usuario</th>
            <th class="text-center" width="10%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr style="display:hidden">
            <td>
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        {{ $user -> id}}
                    </div>
                </div>
            </td>
            <td class="text-center">{{ $user -> email }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>