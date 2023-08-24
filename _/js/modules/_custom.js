document.addEventListener("DOMContentLoaded", () => {

    // count ------------------
    function animateCounters() {
        function animateCounterWithCommas(element, from, to, duration) {
            const startTimestamp = performance.now();

            const step = timestamp => {
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                element.textContent = formatNumberWithCommas(from + progress * (to - from));

                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            };
            requestAnimationFrame(step);
        }
        function formatNumberWithCommas(number) {
            return number.toFixed(1).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        const counterElements = document.querySelectorAll('.card-text-number');
        counterElements.forEach(element => {
            const value = parseFloat(element.textContent.replace(/[^\d.-]/g, '').replace(/,/, '')); // Extract the numeric value from the text and remove commas
            animateCounterWithCommas(element, 0, value, 2500);
        });
    }

    animateCounters();



    // animation search ------------------
    let searchIcon = document.getElementById('searchIcon');
    let closeIcon = document.getElementById('closeIcon');
    let searchMain = document.getElementById('searchMain');

    searchIcon.addEventListener("click", function () {
        searchMain.style.display = "block";
        searchMain.style.animation = 'slideIn 0.8s both';
    });

    closeIcon.addEventListener('click', function () {
        searchMain.style.animation = 'slideOut 0.8s both';
        searchMain.addEventListener("animationend", function () {
            searchMain.style.display = 'none';
            searchMain.style.animation = '';
        }, { once: true });
    });
});
