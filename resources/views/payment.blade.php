<x-app-layout>
    <span
        class="bg-[#E67E22] w-[55rem] h-[55rem] rounded-full inline-block blur-3xl opacity-20 absolute -mt-[30rem] -ml-[30rem] -z-10"></span>
    <span
        class="bg-[#3498DB] w-[15rem] h-[25rem] rounded-l-full inline-block blur-[150px] opacity-50 absolute -mt-[15rem] end-0 -z-10"></span>
    <span
        class="bg-[#8E44AD] w-[25rem] h-[25rem] rounded-l-full inline-block blur-[170px] opacity-30 absolute translate-y-[70%] end-0 bottom-0 -z-10"></span>
    <span
        class="bg-[#3498DB] w-[15rem] h-[15rem] rounded-full inline-block blur-[170px] opacity-30 absolute translate-y-[90%] translate-x-[-10%] bottom-0 -z-10"></span>

    <div class="container w-1/2 mt-24 mx-auto text-center">
        <div class="relative flex flex-row items-center justify-between">
            <!-- Langkah 1 -->
            <div class="relative flex flex-col items-center bg-white-100 z-10">
                <div class="relative w-20 h-20">
                    <div
                        class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                        1
                    </div>
                </div>
                <h4 class="text-gray-900 font-semibold">
                    Detail Project</h4>
            </div>
            <hr class="w-1/4 border-2 mb-6">
            <!-- Langkah 2 -->
            <div class="relative flex flex-col items-center bg-white-100 z-10">
                <div class="relative w-20 h-20">
                    <div
                        class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                        2
                    </div>
                </div>
                <h4 class="text-gray-900 font-semibold">Payment</h4>
            </div>
            <hr class="w-1/4 border-2 mb-6">
            <!-- Langkah 3 -->
            <div class="relative flex flex-col items-center bg-white-100 z-10">
                <div class="relative w-20 h-20">
                    <div
                        class="bg-gray-400 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                        3
                    </div>
                </div>
                <h4 class="text-gray-900 font-semibold">
                    Invoice</h4>
            </div>
        </div>
    </div>
    {{-- <form method="GET" action="{{ route('payment') }}"> --}}
    <div class="grid grid-cols-2 gap-4 mx-24">
        <div class="bg-white w-full p-4 rounded-md shadow-lg">
            <div class="flex flex-row mb-4">
                <h2 class="font-bold text-lg w-1/4">Order ID</h2>
                <h2 class="w-full text-lg inline-block align-middle text-right">
                    {{ session('order_id') }}
                    {{-- {{ $order->id }} --}}
                </h2>
            </div>
            <h2 class="font-bold w-full text-lg mb-2">Identity</h2>
            <div class="flex flex-row">
                <h2 class="text-gray-800">Name:</h2>
                <h2 class="w-full text-lg text-right">{{ $order->user->name }}</h2>
            </div>
            <div class="flex flex-row">
                <h2 class="w-full text-gray-800">Email:</h2>
                <h2 class="text-right text-lg">{{ $order->user->email }}</h2>
            </div>
            <div class="flex flex-row">
                <h2 class="w-full text-gray-800">No Telephone:</h2>
                <h2 class="text-lg">{{ $order->user->phone }}</h2>
            </div>
        </div>
        <div class="row-span-2 bg-slate-400" id="snap-container">

        </div>
        <div class="bg-white w-full p-4 rounded-md shadow-lg">
            <h2 class="font-bold w-full text-lg mb-8 align-middle">Detail Project</h2>
            <div class="flex flex-row">
                <h2 class="text-gray-800 flex items-center">Request:</h2>
                <h2 class="w-full ml-20 text-right">{{ $order->request }}</h2>
            </div>
            <div class="flex flex-row mt-6">
                <h2 class="w-full text-gray-800">Orientation:</h2>
                <h2 class="text-right text-lg">{{ $order->orientation }}</h2>
            </div>
            <div class="flex flex-row">
                <h2 class="w-1/2 text-gray-800">Package:</h2>
                <h2 class="w-full text-right text-lg">{{ $order->package->name }}</h2>
            </div>
            <h2>{{ $snapToken }}</h2>
        </div>
    </div>
    {{-- <button id="pay-button">Bayar Sekarang</button> --}}
    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript"
        src="<https://app.sandbox.midtrans.com/snap/snap.js>"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function (result) {
                    alert("Pembayaran berhasil!");
                    console.log(result);
                },
                onPending: function (result) {
                    alert("Menunggu pembayaran!");
                    console.log(result);
                },
                onError: function (result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function () {
                    alert('Anda menutup pop-up tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script>
    {{-- <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            snap.embed('${snap-token}', {
                embedId: 'snap-container'
            });
        });
    </script> --}}

</x-app-layout>
