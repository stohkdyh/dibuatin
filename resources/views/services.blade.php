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
            Our Expert Services That <br> Drive Results
        </h2>
        <p class="text-sm text-gray-600 mb-5">
            Partner with us to access
            expert-driven solutions designed to
            elevate your brand, achieve your
            goals,
            and make a meaningful impact.
        </p>
        <hr class="border-2 border-orange-200 w-40">
    </div>

    <div class="flex flex-col gap-2 py-8 px-14 mt-14">
        <!-- Gambar di sebelah kanan -->
        <x-expert-service imagePosition="right" title="Short Video Ads"
            desc="Engage your audience with captivating short video ads that convey your message in seconds. Perfect for social media platforms, these bite-sized videos capture attention and spark curiosity, driving immediate action from viewers. Whether you’re launching a new product or sharing an event, our short video ads are designed to create a lasting impression."
            icon1="Instant Impact" icon2="Viral Potential" icon3="High Engagement" icon4="Mobile-Friendly"
            image="/images/bg-short-adds.jpeg">
        </x-expert-service>

        <!-- Gambar di sebelah kiri -->
        <x-expert-service imagePosition="left" title="Advertising Design"
            desc="Boost your brand’s visibility with powerful advertising ads tailored to reach your target audience. From banner ads to interactive visuals, our advertising solutions are crafted to generate interest, increase engagement, and deliver measurable results. Maximize your marketing efforts and make an impact with ads that speak directly to the needs and desires of your audience."
            icon1="Targeted Reach" icon2="Customizable Design" icon3="High Engagement" icon4="Measurable Result"
            image="">
        </x-expert-service>
    </div>

    <footer class="mx-20 mt-40">
        <div class="flex justify-end my-8">
            <div class="w-full">
                <h3 class="text-2xl font-bold">
                    Subscribe to our newsletter
                </h3>
                <p class="text-lg">Find out what
                    we do every week</p>
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
                <p>Lorem Ipsum, 235 Simply,
                    printing, Pin 309 309</p>
                <p>dibuatin.gmail.com</p>
                <p>+62 80005 54442</p>
            </div>
            <div class="grid grid-cols-3 mr-10 gap-28">
                <div class="text-black text-nowrap ">
                    <p class="text-gray-700 font-bold mb-3">
                        Information</p>
                    <p>Home</p>
                    <p>About Us</p>
                    <p>Services</p>
                    <p>Gallery</p>
                </div>
                <div class="text-black text-nowrap">
                    <p class="text-gray-700 font-bold mb-3">
                        Services</p>
                    <p>Short Video Ads</p>
                    <p>Adverstising Design</p>
                </div>
                <div class="text-black text-nowrap ">
                    <p class="text-gray-700 font-bold mb-3">
                        Support</p>
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
            <p class="w-full">&copy 2020 Dibuatin
                Inc.</p>
            <p class="text-nowrap">Privacy Policy
                | Terms & Conditions | Cookies</p>
        </div>
    </footer>
</x-app-layout>
