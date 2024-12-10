<x-app-layout>

    <!-- Panggil Setiap komponen kalian disini -->
    <div class="flex flex-col items-center justify-center gap-y-20 py-28">
        <button class="rounded-full px-7 py-1 border-solid border-black text-xs" disabled style="border-width: 0.1rem">
            Welcome, <span class="font-bold">{{ Auth::user()->name }}</span>
        </button>
        <div class="flex flex-col items-center justify-center gap-y-5">
            <p class="text-7xl">A Digital Agency & Solution</p>
            <p class="text-lg flex items-center mx-auto">To boost your business and sales with <img class="pb-2 h-9"
                    src="/images/logo.png"></p>
        </div>
        <button
            class="rounded-full px-6 py-2 border-solid border-black flex items-center hover:bg-black hover:text-white"
            style="border-width: 0.1rem">
            <p class="pr-3">Explore</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </button>
    </div>
    <!-- Counting Number - Bagas -->
    <div class="flex w-full justify-around items-center bg-white py-8 px-14">
        <h3 class="text-2xl text-black">
            <span class="font-medium text-gray">Achievement</span>
            of <br>
            Dibuatin.com
        </h3>
        <x-counting-number number="980" label="Satisfied Customers">
        </x-counting-number>
        <x-counting-number number="1000" label="Project Completes">
        </x-counting-number>
        <x-counting-number number="1000" label="Employees">
        </x-counting-number>
        <x-counting-number number="20" label="Winning Awards">
        </x-counting-number>
    </div>
    
    <!-- Our Expert Service - Bagas -->
    <div
        class="flex flex-col gap-2 text-right py-8 px-14">
        <h2 class="text-3xl font-bold">
            Our Expert Services That Drive Results
        </h2>
        <p class="text-sm text-gray mb-6">
            Partner with us to access
            expert-driven solutions designed to
            elevate your brand, achieve your
            goals, <br>
            and make a meaningful impact.
        </p>

        <!-- Gambar di sebelah kanan -->
        <x-expert-service imagePosition="right"
            title="Short Video Ads"
            desc="Engage your audience with captivating short video ads that convey your message in seconds. Perfect for social media platforms, these bite-sized videos capture attention and spark curiosity, driving immediate action from viewers. Whether you’re launching a new product or sharing an event, our short video ads are designed to create a lasting impression."
            icon1="Instant Impact"
            icon2="Viral Potential"
            icon3="High Engagement"
            icon4="Mobile-Friendly"
            image="/images/bg-short-adds.jpeg">
        </x-expert-service>

        <!-- Gambar di sebelah kiri -->
        <x-expert-service imagePosition="left"
            title="Advertising Design"
            desc="Boost your brand’s visibility with powerful advertising ads tailored to reach your target audience. From banner ads to interactive visuals, our advertising solutions are crafted to generate interest, increase engagement, and deliver measurable results. Maximize your marketing efforts and make an impact with ads that speak directly to the needs and desires of your audience."
            icon1="Targeted Reach"
            icon2="Customizable Design"
            icon3="High Engagement"
            icon4="Measurable Result" image="">
        </x-expert-service>
    </div>

    <section class="py-12">
        <div class="mx-24 px-6">
            <div class="grid grid-cols-2 gap-8 items-center">
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
                    <p class="text-gray-600 leading-relaxed text-justify text-pretty w-full">
                        Explore a platform built to enhance your journey with innovative tools, personalized
                        solutions, and expert insights. From seamless functionality to dedicated support, experience
                        how our platform drives growth and empowers you to achieve impactful results.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--Benefit Platform - Alstar -->
    <div class="flex w-full justify-between bg-gray-100">
        <div class="container mx-auto py-12 px-6 md:px-24">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center border border-gray-300 mx-auto">
                    <div class="text-orange-600 text-3xl mb-4">&#x3C;&#x3E;</div>
                    <h3 class="text-lg font-semibold text-orange-600">Professional Support</h3>
                    <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                        Receive guidance from a team of experts dedicated to ensuring your success every step of the
                        way,
                        with tailored solutions designed just for you.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center border border-gray-300 mx-auto">
                    <svg class="text-orange-600 mb-4 w-7 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-orange-600">Good Results</h3>
                    <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                        Achieve measurable outcomes that exceed expectations, thanks to our proven strategies
                        and commitment to delivering excellence.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center border border-gray-300 mx-auto ">
                    <svg class="text-orange-600 mb-4 w-7 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-orange-600">Planning & Executing</h3>
                    <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                        Turn your vision into reality with strategic planning and seamless execution,
                        ensuring every detail is handled to perfection.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <!-- Judul dan Deskripsi -->
            <h2 class="text-2xl md:text-3xl text-gray-900 mb-1">
                Innovative Design & Storytelling Through Visuals
            </h2>
            <p class="text-gray-600 mb-8">
                Bringing your brand to life through innovative design and compelling video storytelling, tailored to
                captivate and connect.
            </p>
            <section id="slider">
                <input type="radio" name="slider" id="s1">
                <input type="radio" name="slider" id="s2">
                <input type="radio" name="slider" id="s3"checked>
                <input type="radio" name="slider" id="s4">
                <input type="radio" name="slider" id="s5">
                <!-- Slider images inside labels -->
                <label for="s1" id="slide1">
                    <img src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6b4e41a670c097c8fd2834579f5d5958&auto=format&fit=crop&w=633&q=80"
                        alt="Slide 1">
                    <div class="text-overlay">Slides 1</div>
                </label>
                <label for="s2" id="slide2">
                    <img src="https://images.unsplash.com/photo-1511485977113-f34c92461ad9?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=49899e285952107fdfd9415b8d3bf74a&auto=format&fit=crop&w=634&q=80"
                        alt="Slide 2">
                    <div class="text-overlay">Slides 2</div>
                </label>
                <label for="s3" id="slide3">
                    <img src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-0.3.5&s=739aef35459daa8aaeaa55363d492bc1&auto=format&fit=crop&w=673&q=80"
                        alt="Slide 3">
                    <div class="text-overlay">Slides 3</div>
                </label>
                <label for="s4" id="slide4">
                    <img src="https://images.unsplash.com/photo-1502768040783-423da5fd5fa0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=0c6416353c255d2746a68c8a83943bdf&auto=format&fit=crop&w=634&q=80"
                        alt="Slide 4">
                    <div class="text-overlay">Slides 4</div>
                </label>
                <label for="s5" id="slide5">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9a138cf8acd85036bd292d7f10074e79&auto=format&fit=crop&w=634&q=80"
                        alt="Slide 5">
                    <div class="text-overlay">Slides 5</div>
                </label>
                <!-- Indikator slide -->
                <div class="slider-indicators">
                    <label for="s1" class="indicator"></label>
                    <label for="s2" class="indicator"></label>
                    <label for="s3" class="indicator"></label>
                    <label for="s4" class="indicator"></label>
                    <label for="s5" class="indicator"></label>
                </div>
            </section>
        </div>
    </section>

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
                        <div
                            class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
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
                        <div
                            class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
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
                        <div
                            class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
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
                        <div
                            class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
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
                        <div
                            class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
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
                        <div
                            class="bg-orange-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-xl font-bold shadow-md absolute top-2 left-2 z-10">
                            6
                        </div>
                    </div>
                    <h4 class="text-gray-900 font-semibold mt-4">Deliver</h4>
                    <p class="text-sm text-gray-600">Final Handover</p>
                </div>
            </div>
        </div>
    </section>

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
            <div
                class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 border flex flex-col md:flex-row items-center">
                <!-- Profile Picture -->
                <div class="flex-shrink-0">
                    <img src="/images/profilepic.jpg" alt="Profile Picture"
                        class="w-32 h-32 rounded-full border-4 border-gray-300">
                </div>
                <!-- Testimonial Content -->
                <div class="md:ml-6 mt-4 md:mt-0 text-left">
                    <h3 class="text-xl font-semibold">Aditya Eka</h3>
                    <p class="text-gray-500">Founder of Gun Market</p>
                    <div class="flex items-center">
                        <!-- Star Ratings -->
                        <span class="text-yellow-500 text-lg">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="text-gray-600">
                        "Working with this team has been an absolute game-changer for our business! Their attention to
                        detail,
                        creativity, and dedication to delivering top-notch advertising solutions exceeded all our
                        expectations.
                        The short video ads they crafted not only captured our brand's essence but also boosted our
                        visibility."
                    </p>
                </div>
            </div>
        </div>
    </div>
    <footer class="mx-20">
        <div class="flex justify-end my-8">
            <div class="w-full">
                <h3 class="text-2xl font-bold">Subscribe to our newsletter</h3>
                <p class="text-lg">Find out what we do every week</p>
            </div>
            <input
                class="rounded-xl w-2/5 h-10 my-2 mr-2 text-sm border-gray-200 placeholder-gray-300 border-2 bg-transparent active:border-gray-400 focus:border-gray-400 focus:outline-none"
                placeholder="Insert your email" type="email">
            <button class="rounded-xl h-10 my-2 px-4 text-white text-sm"
                style="background-color: #FF7800">Subscribe</button>
        </div>
        <hr>
        <div class="flex justify-end text-gray-700 items-center my-8">
            <div class="w-full">
                <img src="/images/logo.png" style="margin-left: -0.8rem">
                <p>Lorem Ipsum, 235 Simply, printing, Pin 309 309</p>
                <p>dibuatin.gmail.com</p>
                <p>+62 80005 54442</p>
            </div>
            <div class="grid grid-cols-3 mr-10 gap-28">
                <div class="text-black text-nowrap ">
                    <p class="text-gray-700 font-bold mb-3">Information</p>
                    <p>Home</p>
                    <p>About Us</p>
                    <p>Services</p>
                    <p>Gallery</p>
                </div>
                <div class="text-black text-nowrap">
                    <p class="text-gray-700 font-bold mb-3">Services</p>
                    <p>Short Video Ads</p>
                    <p>Adverstising Design</p>
                </div>
                <div class="text-black text-nowrap ">
                    <p class="text-gray-700 font-bold mb-3">Support</p>
                    <p>Help Center</p>
                    <p>FAQ</p>
                    <p>News</p>
                    <p>Career</p>
                    <p>Terms of Use</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="flex justify-end my-8 text-xs">
            <p class="w-full">&copy 2020 Dibuatin Inc.</p>
            <p class="text-nowrap">Privacy Policy | Terms & Conditions | Cookies</p>
        </div>
    </footer>
</x-app-layout>
