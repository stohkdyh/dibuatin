<x-app-layout>
    <span
        class="bg-[#E67E22] w-[55rem] h-[55rem] rounded-full inline-block blur-3xl opacity-20 absolute -mt-[30rem] -ml-[30rem] -z-10"></span>
    <span
        class="bg-[#3498DB] w-[15rem] h-[25rem] rounded-l-full inline-block blur-[150px] opacity-50 absolute -mt-[15rem] end-0 -z-10"></span>
    <span
        class="bg-[#8E44AD] w-[25rem] h-[25rem] rounded-l-full inline-block blur-[170px] opacity-30 absolute translate-y-[70%] end-0 bottom-0 -z-10"></span>
    <span
        class="bg-[#3498DB] w-[15rem] h-[15rem] rounded-full inline-block blur-[170px] opacity-30 absolute translate-y-[90%] translate-x-[-10%] bottom-0 -z-10"></span>

    <h1 class="mx-24 mt-28 mb-6 text-3xl font-semibold">Transaction History</h1>
    {{-- <form method="GET" action="{{ route('history.show') }}">
        @csrf --}}
    <div class="h-[30rem] mx-24 border-2 border-black border-opacity-10 shadow-xl rounded-xl">
        @foreach ($projects as $project)
            <div class="mx-8 my-14 w-full">
                {{-- <h2 class="font-medium">{{ $project->order_id == $orders->id }}</h2> --}}
                <h2></h2>
            </div>
        @endforeach
    </div>
    {{-- </form> --}}
</x-app-layout>
