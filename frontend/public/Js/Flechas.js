const carrusel = document.querySelector('#mi-carrusel');
const items = carrusel.querySelectorAll('.carousel-item');
let index = 0;

function mostrarSlide(i) {
  items.forEach(item => item.classList.remove('active'));
  items[i].classList.add('active');
}

carrusel.querySelector('.flecha-prev').addEventListener('click', () => {
  index = (index === 0) ? items.length - 1 : index - 1;
  mostrarSlide(index);
});

carrusel.querySelector('.flecha-next').addEventListener('click', () => {
  index = (index === items.length - 1) ? 0 : index + 1;
  mostrarSlide(index);
});