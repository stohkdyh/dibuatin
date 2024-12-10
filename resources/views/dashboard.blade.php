<x-app-layout>

    <!-- Panggil Setiap komponen kalian disini -->

    <!-- Counting Number - Bagas -->
    <div
        class="flex w-full justify-around items-center bg-white py-8 px-14">
        <h3 class="text-2xl text-black">
            <span
                class="font-medium text-gray">Achievement</span>
            of <br>
            Dibuatin.com
        </h3>
        <x-counting-number number="980"
            label="Satisfied Customers">
        </x-counting-number>
        <x-counting-number number="1000"
            label="Project Completes">
        </x-counting-number>
        <x-counting-number number="1000"
            label="Employees">
        </x-counting-number>
        <x-counting-number number="20"
            label="Winning Awards">
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

</x-app-layout>