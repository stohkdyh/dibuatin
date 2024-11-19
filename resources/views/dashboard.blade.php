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

    <!--Benefit Platform - Alstar -->
    <div class="flex w-full justify-between bg-gray-100">
        <div class="container mx-auto py-12 px-6 md:px-24">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center border border-gray-300 mx-auto">
                    <div class="text-orange-600 text-3xl mb-4">&#x3C;&#x3E;</div>
                    <h3 class="text-lg font-semibold text-orange-600">Professional Support</h3>
                    <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                        Receive guidance from a team of experts dedicated to ensuring your success every step of the way, 
                        with tailored solutions designed just for you.
                    </p>
                </div>
    
                <!-- Card 2 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center border border-gray-300 mx-auto">
                    <div class="text-orange-600 text-3xl mb-4">&#x2661;</div>
                    <h3 class="text-lg font-semibold text-orange-600">Good Results</h3>
                    <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                        Achieve measurable outcomes that exceed expectations, thanks to our proven strategies 
                        and commitment to delivering excellence.
                    </p>
                </div>
    
                <!-- Card 3 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center border border-gray-300 mx-auto">
                    <div class="text-orange-600 text-3xl mb-4">&#x1F4C4;</div>
                    <h3 class="text-lg font-semibold text-orange-600">Planning & Executing</h3>
                    <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                        Turn your vision into reality with strategic planning and seamless execution, 
                        ensuring every detail is handled to perfection.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    

    <!-- Customer Review - Alstar -->
    <div class="flex w-full justify-between">
        <div class="container mx-auto py-8 text-center">
            <!-- Heading -->
            <h2 class="text-3xl font-bold mb-4">Voices of Our Valued Customers</h2>
            <p class="text-gray-600 mb-8">
                Discover the genuine experiences of our customers as they share how our services have made a difference 
                in their journey. Real stories, real impact.
            </p>
        
            <!-- Testimonial Card -->
            <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 border flex flex-col md:flex-row items-center">
                <!-- Profile Picture -->
                <div class="flex-shrink-0">
                    <img src="/path-to-image.jpg" alt="Profile Picture" 
                         class="w-32 h-32 rounded-full border-4 border-gray-300">
                </div>
                <!-- Testimonial Content -->
                <div class="md:ml-6 mt-4 md:mt-0 text-left">
                    <h3 class="text-xl font-semibold">Aditya Eka</h3>
                    <p class="text-gray-500">Founder of Gun Market</p>
                    <div class="flex items-center mt-2">
                        <!-- Star Ratings -->
                        <span class="text-yellow-500 text-lg">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="text-gray-600 mt-4">
                        "Working with this team has been an absolute game-changer for our business! Their attention to detail, 
                        creativity, and dedication to delivering top-notch advertising solutions exceeded all our expectations. 
                        The short video ads they crafted not only captured our brand's essence but also boosted our visibility."
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>