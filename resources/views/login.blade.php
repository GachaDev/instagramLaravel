<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <main class="min-h-screen flex justify-center items-center bg-zinc-950">
        <section class="flex flex-col items-center gap-4 w-1/2 max-md:w-2/3">
            <article class="border border-zinc-700 py-6 px-12 w-full">
                <h1 class="text-4xl text-center font-bold text-white">Instagram</h1>
                <form class="flex flex-col mt-8 gap-4" action="{{route('user.doLogin')}}" method="POST">
                    @csrf
                    <input class="bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 w-full outline-none" type="text" name="email" placeholder="Correo electrónico">
                    <input class="bg-zinc-800 text-white border border-zinc-700 rounded-md p-2 w-full outline-none" type="password" name="password" placeholder="Contraseña">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2 w-full">Entrar</button>
                </form>
            </article>
            <article class="border border-zinc-700 p-6 px-12 w-full flex justify-center">
                <p class="text-white text-center">¿No tienes una cuenta? <a class="text-blue-600" href="{{route('showRegister')}}">Regístrate</a></p>
            </article>
        </section>
    </main>
</body>
</html>