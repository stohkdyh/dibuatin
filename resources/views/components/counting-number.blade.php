<div>
    <div
        class="counting-number flex flex-col items-center gap-1">
        <h3 class="text-4xl font-bold">
            {{ $number }}<span>+</span></h3>
        <p class="text-gray text-sm">{{ $label }}
        </p>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded',
        function() {
            const countingElements = document
                .querySelectorAll(
                    '.counting-number h3');

            countingElements.forEach((
                element) => {
                const targetNumber =
                    parseInt(element
                        .textContent);
                let currentNumber = 0;

                const increment = Math
                    .ceil(
                        targetNumber /
                        76
                    ); // Adjust speed here
                const interval =
                    setInterval(
                        () => {
                            currentNumber
                                +=
                                increment;
                            if (currentNumber >=
                                targetNumber
                            ) {
                                currentNumber
                                    =
                                    targetNumber;
                                clearInterval
                                    (
                                        interval
                                    );
                            }
                            element
                                .textContent =
                                currentNumber +
                                '+';
                        },
                        20
                    ); // Adjust duration here
            });
        });
    </script>
</div>