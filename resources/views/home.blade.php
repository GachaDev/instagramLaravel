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
            <article class="flex flex-col gap-2 border-b border-zinc-800 pb-4">
                <div class="flex gap-2 items-center">
                    <img class="w-12 h-12 rounded-full" src="{{asset('default-avatar.webp')}}" alt="User">
                    <span class="text-white font-semibold">kingsleague</span>
                    <span class="text-gray-400">• 13 h</span>
                </div>
                <img class="w-full max-h-[585px] rounded-sm" src="https://media.discordapp.net/attachments/919641744704954461/1343523983059980399/481566662_17957688542868892_3054614692097926808_n.jpg?ex=67bd95b7&is=67bc4437&hm=5a5568a6e688210ea11e86fce0d216ea5dd76068068e5b3bb1ea11a145449033&=&format=webp" alt="Post">
                <div class="flex gap-4 items-center">
                    <x-bi-heart class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/>
                    <x-far-comment class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/>
                </div>
                <div>
                    <span class="text-white">5574 Me gusta</span>
                </div>
                <div>
                    <p class="text-white"><span class="text-white font-semibold">kingsleague</span> Cositas 💖</p>
                </div>
            </article>
            <article class="flex flex-col gap-2 border-b border-zinc-800 pb-4">
                <div class="flex gap-2 items-center">
                    <img class="w-12 h-12 rounded-full" src="{{asset('default-avatar.webp')}}" alt="User">
                    <span class="text-white font-semibold">kingsleague</span>
                    <span class="text-gray-400">• 13 h</span>
                </div>
                <img class="w-full max-h-[585px] rounded-sm" src="https://media.discordapp.net/attachments/919641744704954461/1343523983059980399/481566662_17957688542868892_3054614692097926808_n.jpg?ex=67bd95b7&is=67bc4437&hm=5a5568a6e688210ea11e86fce0d216ea5dd76068068e5b3bb1ea11a145449033&=&format=webp" alt="Post">
                <div class="flex gap-4 items-center">
                    <x-bi-heart class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/>
                    <x-far-comment class="text-white h-6 w-6 cursor-pointer hover:text-gray-400"/>
                </div>
                <div>
                    <span class="text-white">5574 Me gusta</span>
                </div>
                <div>
                    <p class="text-white"><span class="text-white font-semibold">kingsleague</span> Cositas 💖</p>
                </div>
            </article>
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