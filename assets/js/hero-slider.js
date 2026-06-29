const hero = document.querySelector(".hero");

const images = [
  "assets/images/hero/hero1.jpg",
  "assets/images/hero/hero2.jpg",
  "assets/images/hero/hero3.jpg"
];

let index = 0;

function changeHeroImage() {

  hero.style.backgroundImage = `url(${images[index]})`;

  index++;

  if (index >= images.length) {

    index = 0;

  }

}

changeHeroImage();

setInterval(changeHeroImage, 5000);