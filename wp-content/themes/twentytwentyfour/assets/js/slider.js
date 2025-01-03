document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".custom-slider");
    const slides = slider.querySelectorAll("img");
    const pagination = slider.querySelector(".pagination");
    let currentIndex = 0;
    let autoplay = true;

    // Create Pagination
    slides.forEach((_, index) => {
        const dot = document.createElement("span");
        dot.dataset.index = index;
        if (index === 0) dot.classList.add("active");
        pagination.appendChild(dot);
    });

    const dots = pagination.querySelectorAll("span");

    // Change Slide
    function changeSlide(index) {
        slides[currentIndex].classList.remove("active");
        dots[currentIndex].classList.remove("active");
        currentIndex = index;
        slides[currentIndex].classList.add("active");
        dots[currentIndex].classList.add("active");
    }

    // Autoplay
    let interval = setInterval(() => {
        if (autoplay) {
            const nextIndex = (currentIndex + 1) % slides.length;
            changeSlide(nextIndex);
        }
    }, 3000);

    // Stop Autoplay on Hover
    slider.addEventListener("mouseover", () => {
        autoplay = false;
    });

    slider.addEventListener("mouseout", () => {
        autoplay = true;
    });

    // Pagination Click
    dots.forEach((dot) => {
        dot.addEventListener("click", (e) => {
            changeSlide(parseInt(e.target.dataset.index, 10));
        });
    });
});
