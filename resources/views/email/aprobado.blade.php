<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidato TCU Aprobado</title>
</head>
<body>
<p>Saludos compañeros.</p>
<p>Se autoriza la matricula de TCU al estudiante {{$candidato['nombre']}} {{$candidato['apellido']}} con numero de carné {{$candidato['carne']}}</p>
<p>Autorizado por: {{$remitente['name']}} {{$remitente['apellido']}}<br>
email: {{$remitente['email']}} <br>
Muchas Gracias</p>

</body>
</html>
