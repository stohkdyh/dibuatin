<x-app-layout>
    <span
        class="bg-[#E67E22] w-[55rem] h-[55rem] rounded-full inline-block blur-3xl opacity-20 absolute -mt-[30rem] -ml-[30rem] -z-10"></span>
    <span
        class="bg-[#3498DB] w-[15rem] h-[25rem] rounded-l-full inline-block blur-[150px] opacity-50 absolute -mt-[15rem] end-0 -z-10"></span>
    <span
        class="bg-[#8E44AD] w-[25rem] h-[25rem] rounded-l-full inline-block blur-[170px] opacity-30 absolute translate-y-[70%] end-0 bottom-0 -z-10"></span>
    <span
        class="bg-[#3498DB] w-[15rem] h-[15rem] rounded-full inline-block blur-[170px] opacity-30 absolute translate-y-[90%] translate-x-[-10%] bottom-0 -z-10"></span>

    <div class="container w-1/2 mt-48 mx-auto text-center">
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
                        class="bg-gray-400 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
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

    <div class="flex mx-24 border-1 border-gray-200 bg-gray-200 rounded-xl select-none">
        <label class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer">
            <input type="radio" name="radio" value="html" class="peer hidden" checked="" />
            <span
                class="w-full py-2 text-center text-xl peer-checked:bg-orange-500 peer-checked:font-semibold peer-checked:text-white p-2 rounded-lg transition duration-150 ease-in-out">Short
                Video Ads</span>
        </label>

        <label class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer">
            <input type="radio" name="radio" value="react" class="peer hidden" />
            <span
                class="w-full py-2 text-center text-xl peer-checked:bg-orange-500 peer-checked:font-semibold peer-checked:text-white p-2 rounded-lg transition duration-150 ease-in-out">Advertising
                Design</span>
        </label>
    </div>

    <div class="relative drop-shadow-xl w-48 h-64 my-96 mx-auto overflow-hidden rounded-xl bg-[#3d3c3d]">
        <div
            class="absolute flex items-center justify-center text-white z-[1] opacity-90 rounded-xl inset-0.5 bg-[#323132]">
            CARD
        </div>
        <div class="absolute w-56 h-48 bg-white blur-[50px] -left-1/2 -top-1/2"></div>
    </div>


</x-app-layout>
