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
        <section class="flex flex-col items-center gap-4">
            <h1 class="text-xl text-center font-semibold text-white">Instagram</h1>
            <a class="bg-blue-600 hover:bg-blue-700 text-white rounded-md p-2 w-full text-center" href="{{route('posts.create')}}">Crear post</a>
            <form action="{{ route('user.destroyAccount') }}" method="post">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white rounded-md flex gap-2 p-2 w-full text-center" type="submit"><x-bi-trash3-fill class="text-white h-6 w-6"></x-bi-trash3-fill> Eliminar cuenta</button>
            </form>
        </section>
        <section class="flex flex-col gap-4 overflow-y-scroll max-h-screen custom-scrollbar">
            @foreach($posts as $post)
                <article class="flex flex-col gap-2 border-b border-zinc-800 pb-4">
                    <div class="flex justify-between items-center">
                        <div class="flex gap-2 items-center">
                            <img class="w-12 h-12 rounded-full" src="{{asset('default-avatar.webp')}}" alt="User">
                            <span class="text-white font-semibold">{{ $post->user->name }}</span>
                            <span class="text-gray-400">• {{ $post->published_at->diffForHumans() }}</span>
                        </div>
                        @if (auth()->user()->id == $post->user->id)
                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                <button type="submit"><x-bi-trash3-fill class="text-red-500 hover:text-red-600 h-6 w-6"></x-bi-trash3-fill></button>
                            </form>
                        @endif
                    </div>
                    <img class="w-full max-h-[585px] rounded-sm object-cover object-top" src={{asset($post->url_image)}} alt="Post">
                    <div class="flex gap-4 items-center">
                        <form class="flex items-center" action="{{route('posts.like', $post->id)}}" method="POST">
                            @csrf
                            <button type="submit"><x-bi-heart class="text-white h-6 w-6 cursor-pointer hover:text-red-500"></x-bi-heart></button>
                        </form>
                        <x-far-comment class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/>
                    </div>
                    <div>
                        <span class="text-white">{{ $post->n_likes }} Me gusta</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-white max-w-prose"><span class="text-white font-semibold">{{ $post->user->name }}</span> {{ $post->description }}</p>
                        <a class="text-gray-400 cursor-pointer">Ver los {{ $post->comments->count() }} comentarios</a>
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