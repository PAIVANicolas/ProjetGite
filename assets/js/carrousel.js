const imgs = document.querySelectorAll('.carrousel-img');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');

let index = 0;

function layout() {
  const xOffsetStep = 100;
  const count = imgs.length;
  const scaleStep = 0.6;
  const opacityStep = 0.5;

  for(let i = 0; i < imgs.length; i++) {
    const img = imgs[i];
    const sign = Math.sign(i - index);

    let xOffset = (i - index) * xOffsetStep;
    if(i !== index) {
      xOffset = xOffset + 80 * sign;
    }
    const scale = scaleStep ** Math.abs(i - index);
    const rotateY = i === index ? 0 : 30 * -sign;
    img.style.transform = `perspective(800px) translateX(${xOffset}px) scale(${scale}) rotateY(${rotateY}deg)`;

    let opacity = opacityStep ** Math.abs(i - index);
    if(Math.abs(i - index) > 2) {
      opacity = 0;
    }
    img.style.opacity = opacity;

    img.style.zIndex = count - Math.abs(index - i);
  }
}

layout();

function updateClasses() {
  imgs.forEach((img, i) => {
    img.classList.remove('active');
    img.classList.remove('next');
  });

  imgs[index].classList.add('active');

  if (index < imgs.length - 1) {
    imgs[index + 1].classList.add('next');
  } else {
    imgs[0].classList.add('next');
  }
}

updateClasses();

next.addEventListener('click', () => { 
  index++;
  if (index >= imgs.length) {
    index = 0;
  }
  layout();
  updateClasses();
});

prev.addEventListener('click', () => { 
  index--;
  if (index < 0) {
    index = imgs.length - 1;
  }
  layout();
  updateClasses();
});