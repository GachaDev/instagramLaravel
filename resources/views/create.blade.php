<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instagram</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <main class="min-h-screen flex justify-center items-center bg-zinc-950 p-4">
        <section class="flex flex-col items-center gap-4 w-1/2 max-md:w-2/3">
            <article class="border border-zinc-700 py-6 px-12 w-full">
                <h1 class="text-4xl text-center font-bold text-white">Subir publicación</h1>
                <form class="flex flex-col mt-8 gap-4" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 w-full outline-none" type="text" name="title" placeholder="Título">
                    @error('title') <small class="text-red-500">{{ $message }}</small> @enderror
                    <input class="bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 w-full outline-none" type="text" name="description" placeholder="Descripción">
                    @error('description') <small class="text-red-500">{{ $message }}</small> @enderror
                    <input class="bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 w-full outline-none" type="file" name="image" accept="image/*" required>
                    @error('image') <small class="text-red-500">{{ $message }}</small> @enderror
                    <button class="bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2 w-full">Crear</button>
                </form>
            </article>
            <article class="border border-zinc-700 p-6 px-12 w-full flex justify-center">
                <p class="text-white text-center">¿No quieres subir ninguna publicación? <a class="text-blue-600" href="{{route('home')}}">Volver</a></p>
            </article>
        </section>
    </main>
</body>
</html>