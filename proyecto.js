const menub = document.getElementById("menub");
    const navlin = document.getElementById("navlin");

    menub.addEventListener("click", () => {
      navlin.classList.toggle("active");
      if(navlin.classList.contains("active")){
        menub.innerHTML = '<i class="fa fa-times"></i>'; // ícono de cerrar
        menub.setAttribute("aria-expanded", "true");
      } else {
        menub.innerHTML = '<i class="fa fa-bars"></i>'; // ícono de menú
        menub.setAttribute("aria-expanded", "false");
      }
    });

    document.addEventListener("DOMContentLoaded", () => {
  let slideIndex = 0;
  const slides = document.querySelectorAll(".carousel-slide");
  const dots = document.querySelectorAll(".dot");
  const totalSlides = slides.length;
  const container = document.querySelector(".carousel-container");

  function showSlides() {
    if (slideIndex >= totalSlides) slideIndex = 0;
    if (slideIndex < 0) slideIndex = totalSlides - 1;
    container.style.transform = `translateX(-${slideIndex * 100}%)`;
    dots.forEach(dot => dot.classList.remove("active"));
    dots[slideIndex].classList.add("active");
  }

  function nextSlide() {
    slideIndex++;
    showSlides();
  }

  function prevSlide() {
    slideIndex--;
    showSlides();
  }

  function currentSlide(n) {
    slideIndex = n - 1;
    showSlides();
  }

  setInterval(nextSlide, 10000);
  showSlides();

  window.nextSlide = nextSlide;
  window.prevSlide = prevSlide;
  window.currentSlide = currentSlide;
});


    