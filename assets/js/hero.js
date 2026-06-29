const counters = document.querySelectorAll(".counter");

counters.forEach(counter => {

  const target = +counter.getAttribute("data-target");

  let count = 0;

  const speed = target / 80;

  function updateCounter() {

    count += speed;

    if (count < target) {

      counter.innerText = Math.ceil(count);

      requestAnimationFrame(updateCounter);

    } else {

      counter.innerText = target + "+";

    }

  }

  updateCounter();

});