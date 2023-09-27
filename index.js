document.addEventListener("DOMContentLoaded", function () {
  const runCounter = (counter, speed) => {
    const target = parseInt(counter.getAttribute("data-target"));
    const increment = Math.ceil(target / speed);
    let currentCount = 0;
  
    const updateCount = () => {
      if (currentCount < target) {
        currentCount += increment;
        counter.innerText = currentCount;
        setTimeout(updateCount, 50); // Increase the delay for slower counting
      } else {
        counter.innerText = target;
        counter.classList.add("highlight");
      }
    };
  
    updateCount();
  };
  
  // Intersection Observer
  const options = {
    root: null,
    rootMargin: "0px",
    threshold: 0.5,
  };
  
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const counters = entry.target.querySelectorAll(".count");
        counters.forEach((counter) => runCounter(counter, 2000)); // Pass the speed value here
        observer.unobserve(entry.target);
      }
    });
  }, options);
  
  // Observe the specific section
  const specificSection = document.querySelector(".counting");
  observer.observe(specificSection);
});

// Gallery effects
const swiper = new Swiper('.swiper-container', {
  direction: 'vertical',
  mousewheel: {},
  effect: 'cube',
  keyboard: {
    enabled: true,
    onlyInViewport: false
  }
});
