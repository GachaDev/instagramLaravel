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
    <main class="flex justify-center h-screen bg-zinc-950 p-6">
        <div class="w-1/2 h-full flex items-center border-r border-zinc-800">
            <div class="border-r border-zinc-800 flex w-full">
                <img class="w-full max-h-[585px] rounded-sm object-cover object-top" src={{asset($post->url_image)}} alt="Post">
                {{-- <div class="flex gap-4 items-center">
                    <form class="flex items-center" action="{{route('posts.like', $post->id)}}" method="POST">
                        @csrf
                        <button type="submit"><x-bi-heart class="text-white h-6 w-6 cursor-pointer hover:text-red-500"></x-bi-heart></button>
                    </form>
                    <a href="{{route('posts.get', $post->id)}}"><x-far-comment class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/></a>
                </div>
                <div>
                    <span class="text-white">{{ $post->n_likes }} Me gusta</span>
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-white max-w-prose"><span class="text-white font-semibold">{{ $post->user->name }}</span> {{ $post->description }}</p>
                    <a href="{{route('posts.get', $post->id)}}" class="text-gray-400 cursor-pointer">Ver los {{ $post->comments->count() }} comentarios</a>
                </div> --}}
            </div>
        </div>
        <div class="flex justify-between h-full flex-col">
            <div class="flex items-center gap-2 border-b border-zinc-800 pb-4 pl-4">
                <img class="w-12 h-12 rounded-full" src="{{asset('default-avatar.webp')}}" alt="User">
                <span class="text-white font-semibold">{{ $post->user->name }}</span>
                <span class="text-gray-400">• {{ $post->title }}</span>
                @if (auth()->user()->id == $post->user->id)
                    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        <button type="submit"><x-bi-trash3-fill class="text-red-500 hover:text-red-600 h-6 w-6"></x-bi-trash3-fill></button>
                    </form>
                @endif
            </div>
            <div class="flex flex-col gap-4 pl-4 pt-4 h-full overflow-y-scroll custom-scrollbar">
                <div class="flex gap-4">
                    <img class="w-10 h-10 rounded-full" src="{{asset('default-avatar.webp')}}" alt="User">
                    <div class="flex flex-col">
                        <p class="text-white max-w-prose"><span class="text-white font-semibold">{{ $post->user->name }}</span> {{ $post->description }}</p>
                        <span class="text-gray-400">{{ $post->published_at->diffForHumans() }}</span>
                    </div>
                </div>
                @foreach($post->comments as $comment)
                    <div class="flex gap-4">
                        <img class="w-10 h-10 rounded-full" src="{{asset('default-avatar.webp')}}" alt="User">
                        <div class="flex flex-col">
                            <p class="text-white max-w-[50ch]"><span class="text-white font-semibold">{{ $comment->user->name }}</span> {{ $comment->comment }}</p>
                            <span class="text-gray-400">{{ $comment->publish_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col gap-2 pl-4 pt-4 border-t border-zinc-800">
                <div class="flex gap-4 items-center">
                    <form class="flex items-center" action="{{route('posts.like', $post->id)}}" method="POST">
                        @csrf
                        <button type="submit"><x-bi-heart class="text-white h-6 w-6 cursor-pointer hover:text-red-500"></x-bi-heart></button>
                    </form>
                    <a href="{{route('posts.get', $post->id)}}"><x-far-comment class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/></a>
                </div>
                <div>
                    <span class="text-white">{{ $post->n_likes }} Me gusta</span>
                    <p class="text-gray-400 text-sm">{{$post->published_at->diffForHumans()}}</p>
                </div>
                <div class="py-2 border-t border-zinc-800">
                    <form class="flex justify-between" action="{{route('comments.store', $post->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="text" name="comment" placeholder="Escribe tu comentario..." class="w-full text-white bg-transparent border-none outline-none">
                        <button type="submit" class="text-blue-500 cursor-pointer hover:text-blue-600">Publicar</button>
                    </form>
                    @error('comment')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </main>
</body>
</html>