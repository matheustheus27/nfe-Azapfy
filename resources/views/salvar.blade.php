<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de NFe</title>
</head>
<body>
    <form action="/salvar/nfe" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Arquivo do NFe: </label>
        <input type="file" name="nfe">
        <br>
        <button>Registrar</button>
    </form>
</body>
</html>