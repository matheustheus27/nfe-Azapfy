<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerar Danfe</title>
</head>
<body>
    <form action="/danfe/renderizar" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Arquivo do NFe: </label>
        <input type="file" name="nfe">
        <br>
        <button>Gerar</button>
    </form>
</body>
</html>