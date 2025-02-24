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
    <main class="flex justify-between h-screen bg-zinc-950 p-6">
        <section>
            <h1 class="text-xl text-center font-semibold text-white">Instagram</h1>
        </section>
        <section class="flex flex-col gap-4 overflow-y-scroll max-h-screen custom-scrollbar">
            @foreach($posts as $post)
                <article class="flex flex-col gap-2 border-b border-zinc-800 pb-4">
                    <div class="flex gap-2 items-center">
                        <img class="w-12 h-12 rounded-full" src="{{asset('default-avatar.webp')}}" alt="User">
                        <span class="text-white font-semibold">{{ $post->user->name }}</span>
                        <span class="text-gray-400">• {{ $post->published_at->diffForHumans() }}</span>
                    </div>
                    <img class="w-full max-h-[585px] rounded-sm object-cover object-top" src={{asset($post->url_image)}} alt="Post">
                    <div class="flex gap-4 items-center">
                        <x-bi-heart class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/>
                        <x-far-comment class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/>
                    </div>
                    <div>
                        <span class="text-white">{{ $post->n_likes }} Me gusta</span>
                    </div>
                    <div>
                        <p class="text-white"><span class="text-white font-semibold">kingsleague</span> Cositas 💖</p>
                    </div>
                </article>
            @endforeach
        </section>
        <section class="flex flex-col gap-6">
            <div class="flex gap-4 justify-between items-center">
                <div class="flex gap-2 items-center">
                    <img class="w-12 h-12 rounded-full" src="{{asset('default-avatar.webp')}}" alt="User">
                    <h1 class="text-white">{{ auth()->user()->name }}</h1>
                </div>
                <form action="{{route('user.doLogout')}}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 rounded-md p-2 w-full hover:text-red-600">Cerrar sesión</button>
                </form>
            </div>
            <h1 class="text-gray-400">Sugerencias para ti</h1>
        </section>
    </main>
</body>
</html>