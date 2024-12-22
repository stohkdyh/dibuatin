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
    <div class="mx-24 border-2 border-black border-opacity-10 shadow-xl rounded-xl">
        @foreach ($orders as $order)
            <div
                class="bg-white bg-opacity-60 mx-8 my-4 rounded-xl px-6 border-2 py-3 border-gray-400 border-opacity-10 shadow-xl">
                <div class="flex items-center relative py-2">
                    <h2 class="text-xl font-medium mr-5">{{ $order->package->product->name }}</h2>
                    <h2 class="text-gray-400">{{ $order->created_at->format('d M Y') }}</h2>
                    @if ($order->status == 'completed')
                        <span
                            class="absolute end-0 px-6 py-[0.3rem] bg-[#00FF00] bg-opacity-10 border-[#00FF00] border-[0.13rem] rounded-2xl text-[#009900]">{{ ucwords($order->status) }}</span>
                    @elseif ($order->status == 'in progress')
                        <span
                            class="absolute end-0 px-6 py-[0.3rem] bg-[#FFFF00] bg-opacity-20 border-[#FFFF00] border-[0.13rem] rounded-2xl text-[#C6C600]">{{ ucwords($order->status) }}</span>
                    @else
                        <span
                            class="absolute end-0 px-6 py-[0.3rem] bg-[#1437ff] bg-opacity-20 border-[#1437ff] border-[0.13rem] rounded-2xl text-[#2c46b9]">{{ ucwords($order->status) }}</span>
                    @endif
                </div>
                <hr>
                <div class="flex items-center relative py-2">
                    <h2 class="font-bold text-xl">{{ $order->request }}</h2>
                    <div class="flex flex-col -space-y-1 text-right absolute end-0 mr-1">
                        <h2>Total</h2>
                        <h2 class="font-bold">IDR {{ number_format($order->price, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- </form> --}}
</x-app-layout>
