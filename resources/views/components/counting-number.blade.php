<div>
    <div class="counting-number">
        <h3>{{ $number }}<span>+</span></h3>
        <p>{{ $label }}</p>
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
                        100
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