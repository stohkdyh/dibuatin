<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Panggil Setiap komponen kalian disini -->


    <!-- Counting Number - Bagas -->
    <div class="flex w-full justify-between">
        <h3 class="">
            Achievement <span class="">of
                Dibuatin.com</span>
        </h3>
    </div>

    <!-- Choose Us - Fardhi -->
    <div class="flex w-full justify-between">
        <section class="py-12">
            <div class="container mx-32 px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <!-- Left Column -->
                    <div>
                        <h6 class="text-orange-500 uppercase text-xs tracking-wide mb-2">
                            | Why Choose Us
                        </h6>
                        <h2 class="text-4xl font-thin text-gray-900 mb-9">
                            Discover the Benefits of Our Platform
                        </h2>
                    </div>
                    <!-- Right Column -->
                    <div>
                        <p class="text-gray-600 leading-relaxed text-justify">
                            Explore a platform built to enhance your journey with innovative tools, personalized solutions, 
                            and expert insights. From seamless functionality to dedicated support, experience how our platform 
                            drives growth and empowers you to achieve impactful results.
                        </p>
                    </div>
                </div>
            </div>
        </section>                     
    </div>

    <!-- WorkFlow - Fardhi -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <!-- Judul dan Deskripsi -->
            <h2 class="text-2xl md:text-3xl text-gray-900 mb-1">
                Our Proven Workflow for Outstanding Results
            </h2>
            <p class="text-gray-600 mb-8">
                Our streamlined process guarantees efficient, precise results from start to finish.
            </p>
    
            <!-- Langkah Workflow -->
            <div class="relative flex items-center justify-between">
                <!-- Garis Horizontal -->
                <div class="absolute top-10 w-full h-0.5 bg-gray-300"></div>
    
                <!-- Langkah 1 -->
                <div class="relative flex flex-col items-center bg-gray-100 z-10">
                    <div class="relative w-20 h-20">
                        <!-- Lingkaran Putih -->
                        <div class="bg-white rounded-full w-full h-full absolute"></div>
                        <!-- Lingkaran Oranye -->
                        <div class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                            1
                        </div>
                    </div>
                    <h4 class="text-gray-900 font-semibold mt-4">Discuss</h4>
                    <p class="text-sm text-gray-600">Idea Exchange</p>
                </div>
    
                <!-- Langkah 2 -->
                <div class="relative flex flex-col items-center bg-gray-100 z-10">
                    <div class="relative w-20 h-20">
                        <div class="bg-white rounded-full w-full h-full absolute"></div>
                        <div class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                            2
                        </div>
                    </div>
                    <h4 class="text-gray-900 font-semibold mt-4">Planning</h4>
                    <p class="text-sm text-gray-600">Goal Setting</p>
                </div>
    
                <!-- Langkah 3 -->
                <div class="relative flex flex-col items-center bg-gray-100 z-10">
                    <div class="relative w-20 h-20">
                        <div class="bg-white rounded-full w-full h-full absolute"></div>
                        <div class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                            3
                        </div>
                    </div>
                    <h4 class="text-gray-900 font-semibold mt-4">Sketch</h4>
                    <p class="text-sm text-gray-600">Visual Draft</p>
                </div>
    
                <!-- Langkah 4 -->
                <div class="relative flex flex-col items-center bg-gray-100 z-10">
                    <div class="relative w-20 h-20">
                        <div class="bg-white rounded-full w-full h-full absolute"></div>
                        <div class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                            4
                        </div>
                    </div>
                    <h4 class="text-gray-900 font-semibold mt-4">Development</h4>
                    <p class="text-sm text-gray-600">Build Process</p>
                </div>
    
                <!-- Langkah 5 -->
                <div class="relative flex flex-col items-center bg-gray-100 z-10">
                    <div class="relative w-20 h-20">
                        <div class="bg-white rounded-full w-full h-full absolute"></div>
                        <div class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                            5
                        </div>
                    </div>
                    <h4 class="text-gray-900 font-semibold mt-4">Quality Control</h4>
                    <p class="text-sm text-gray-600">Error Check</p>
                </div>
    
                <!-- Langkah 6 -->
                <div class="relative flex flex-col items-center bg-gray-100 z-10">
                    <div class="relative w-20 h-20">
                        <div class="bg-white rounded-full w-full h-full absolute"></div>
                        <div class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                            6
                        </div>
                    </div>
                    <h4 class="text-gray-900 font-semibold mt-4">Deliver</h4>
                    <p class="text-sm text-gray-600">Final Handover</p>
                </div>
            </div>
        </div>
    </section>
        
</x-app-layout>