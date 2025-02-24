<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" required>

        <label for="description">Descripción:</label>
        <textarea name="description" required></textarea>

        <label for="image">Imagen:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Publicar</button>
    </form>
</body>
</html>