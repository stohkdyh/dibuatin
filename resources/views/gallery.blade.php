<x-app-layout>
    <span
        class="bg-[#E67E22] w-[55rem] h-[55rem] rounded-full inline-block blur-3xl opacity-20 absolute -mt-[30rem] -ml-[30rem] -z-10"></span>
    <span
        class="bg-[#3498DB] w-[15rem] h-[25rem] rounded-l-full inline-block blur-[150px] opacity-50 absolute -mt-[15rem] end-0 -z-10"></span>
    <span
        class="bg-[#8E44AD] w-[25rem] h-[25rem] rounded-l-full inline-block blur-[170px] opacity-30 absolute translate-y-[70%] end-0 bottom-0 -z-10"></span>
    <span
        class="bg-[#3498DB] w-[15rem] h-[15rem] rounded-full inline-block blur-[170px] opacity-50 absolute translate-y-[90%] translate-x-[-10%] bottom-0 -z-50"></span>

    <div class="flex flex-col gap-2 py-28 mt-24 px-14">
        <h2 class="text-[5rem] mb-3 leading-[1.15]">
            Innovative Design & Storytelling Through Visuals
        </h2>
        <p class="text-sm text-gray-600 mb-5">
            Bringing your brand to life through innovative design and compelling video storytelling, tailored to captivate and connect.
        </p>
        <hr class="border-2 border-orange-200 w-40">
    </div>

    <div class="grid grid-cols-3 gap-4 px-14">
        <div class="bg-slate-400 col-span-2">
            <video class="w-full h-full" autoplay loop>
                <source src="/videos/spotify_ad.mp4" type="video/mp4">
            </video>
        </div>
        <div class="bg-slate-400 row-span-2">02</div>
        <div class="bg-slate-400 row-span-2">03</div>
        <div class="bg-slate-400">
            <img class="object-cover h-full" src="https://i.pinimg.com/736x/20/db/3c/20db3c22a21d15f9385f94e7c82b3f97.jpg">
        </div>
        <div class="bg-slate-400 row-span-2">
            <video class="w-full h-full" autoplay loop>
                <source src="/videos/videoplayback.mp4" type="video/mp4">
            </video>
        </div>
        <div class="bg-slate-400">06</div>
        <div class="bg-slate-400">07</div>
        <div class="bg-slate-400">08</div>
        <div class="bg-slate-400">
            <video class="w-full h-full" autoplay loop>
                <source src="/videos/videoads.mp4" type="video/mp4">
            </video>
        </div>
        <div class="bg-slate-400 col-span-2">10</div>
    </div>
    {{-- <div class="grid grid-cols-3 gap-4 px-14">
        <div class="col-span-2">
            <video class="w-full h-full" autoplay loop>
                <source src="/videos/spotify_ad.mp4" type="video/mp4">
            </video>
        </div>
        <div class="bg-gray-500 row-span-2 h-fit items-center justify-center">
            <img class="object-contain h-full" src="https://images.unsplash.com/photo-1516715337554-9827022cdb29?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        </div>
        <div class="bg-gray-500 h-fit items-center justify-center">
            <img class="object-contain h-full" src="https://i.pinimg.com/736x/2a/cc/81/2acc815a6366d3d3643c63b1767fceb9.jpg">
        </div>
        <div class="bg-gray-500">07</div>
        <div class="bg-gray-500 h-fit items-center justify-center">
            <img class="object-cover h-full" src="https://i.pinimg.com/736x/20/db/3c/20db3c22a21d15f9385f94e7c82b3f97.jpg">
        </div>
        <div class="row-span-2">
            <video class="w-full h-full" autoplay loop>
                <source src="/videos/videoplayback.mp4" type="video/mp4">
            </video>
        </div>
        <div class="bg-gray-500 h-fit items-center justify-center">
            <img class="object-contain h-full" src="https://i.pinimg.com/736x/f5/e5/b7/f5e5b73bfbd46a2052d0ceb3ac2bfa71.jpg">
        </div>
        <div class="bg-gray-500">07</div>
        <div class="bg-gray-500">08</div>
        <div class="bg-gray-500">
            <video class="w-full h-full" autoplay loop>
                <source src="/videos/videoads.mp4" type="video/mp4">
            </video>
        </div>
        <div class="bg-gray-500 col-span-2">10</div>
    </div> --}}
</x-app-layout>
