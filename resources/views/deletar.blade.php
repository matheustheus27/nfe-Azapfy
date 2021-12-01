<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deleta NFe</title>
</head>
<body>
    <form action="/deletar/nfe" method="GET" enctype="multipart/form-data">
        @csrf
        <label>Id do NFe: </label>
        <input type="text" name="nfe">
        <br>
        <button>Deletar</button>
    </form>
</body>
</html>