<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidato TCU Rechazado</title>
</head>
<body>
<p>Saludos {{$candidato['nombre']}}.</p>
<p>Porfavor corregir lo siguiente : <br> {{$candidato['descripcion']}}</p>

<p class="mt-5">Enviado por: {{$remitente['name']}} {{$remitente['apellido']}}<br>
email: {{$remitente['email']}}<br>
Muchas Gracias</p>

</body>
</html>
