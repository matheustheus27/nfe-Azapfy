<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualização de NFe</title>
</head>
<body>
    <form action="/atualizar/nfe" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Id do NFe: </label>
        <input type="text" name="id">
        <br>
        <label>Arquivo do NFe: </label>
        <input type="file" name="nfe">
        <br>
        <button>Atualizar</button>
    </form>
</body>
</html>