@props([
'imagePosition' => 'left',
"title" => "",
"desc" => "",
"icon1" => "",
"icon2" => "",
"icon3" => "",
"icon4" => "",
"image" => "",
])

<div
    class="flex my-6 gap-6 justify-center items-center rounded-lg 
    {{ $imagePosition === 'right' ? '' : 'flex-row-reverse' }}">
    <!-- Bagian Konten -->
    <div class="w-1/2">
        <h2
            class="text-2xl font-bold mb-4 text-left">
            {{ $title ?: "Advertising Design" }}
        </h2>
        <p class="text-gray-600 mb-6 text-left">
            {{ $desc ?: "Boost your brand’s visibility with powerful advertising ads tailored to reach your target audience. From banner ads to interactive visuals, our advertising solutions are crafted to generate interest, increase engagement, and deliver measurable results. Maximize your marketing efforts and make an impact with ads that speak directly to the needs and desires of your audience." }}
        </p>
        <div>
            <div
                class="flex flex-wrap gap-4 mb-6">
                <!-- icon 1 -->
                <div
                    class="flex items-center gap-2 w-1/3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                    </svg>
                    <span class="text-gray-700">
                        {{ $icon1 ?: "Instant Impact" }}
                    </span>
                </div>
                <!-- icon 2 -->
                <div
                    class="flex items-center gap-2 w-1/3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="text-gray-700">
                        {{ $icon2 ?: "Viral Potential" }}
                    </span>
                </div>
                <!-- icon 3 -->
                <div
                    class="flex items-center gap-2 w-1/3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                    <span class="text-gray-700">
                        {{ $icon3 ?: "High Engagement" }}
                    </span>
                </div>
                <!-- icon 4 -->
                <div
                    class="flex items-center gap-2 w-1/3">
                    <svg width="18" height="19"
                        viewBox="0 0 18 19"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 2H4.5C3.67157 2 3 2.67157 3 3.5V15.5C3 16.3284 3.67157 17 4.5 17H13.5C14.3284 17 15 16.3284 15 15.5V3.5C15 2.67157 14.3284 2 13.5 2Z"
                            stroke="black"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M9 14H9.0075"
                            stroke="black"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                    <span class="text-gray-700">
                        {{ $icon4 ?: "Mobile-Friendly" }}
                    </span>
                </div>
            </div>
            <button
                class="px-6 py-2 w-full bg-white border-2 border-gray rounded-lg shadow hover:bg-gray-100">
                Order
            </button>
        </div>
    </div>

    <!-- Bagian Gambar -->
    <div class="w-1/2">
        <img class="object-cover rounded-xl w-full h-72"
            src={{ $image ?: "/images/bg-short-adds.jpeg"}}
            alt="Short Video Adds">
    </div>
</div>